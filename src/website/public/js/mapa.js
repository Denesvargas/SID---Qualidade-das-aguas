const dmsToDd = ({lat: lat, lng: lng}) => {
    const [deg1, min1 = '0', seg1 = '0', dir1 = 'S'] = lat.split(/[^\d\w.]+/);
    const [deg2, min2 = '0', seg2 = '0', dir2 = 'W'] = lng.split(/[^\d\w.]+/);
    return {
        lat: -Number(convertDMSToDD(deg1, min1, seg1, dir1)),
        lng: -Number(convertDMSToDD(deg2, min2, seg2, dir2))
    };
};

const convertDMSToDD = (deg, min, sec, direction)  => {
    let dd = Number(deg) + (Number(min) / 60) + (Number(sec) / 3600);
    if (direction === 'S'
        || direction === 'W'
        || direction === 'O') {
        dd = dd * -1;
    }
    return dd.toString();
};

function initMap() {
    const geoRS = { lat: -29.701, lng:  -53.718 };
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: geoRS,
    });

    const urlParams = new URLSearchParams(window.location.search);
    const search = urlParams.get('q');

    const url = new URL('http://localhost:8000/pesquisa');
    url.searchParams.append('q', search)

    fetch(url)
        .then(r => r.json())
        .then(json => {
            json.forEach(b => {
                if (!!b && !!b.latitude_s) {
                    const geo = dmsToDd({lat: b.latitude_s, lng: b.longitude_o});
                    const marker = new google.maps.Marker({position: geo, map});
                    var infoWindow = new google.maps.InfoWindow({
                        content: `<div><div><h3>${b.identificacao_corpo_hidrico}<h3></div><h4>Bacia: ${b.bacia
                        }</h4><h4>Tipo de bacia: ${b.tipo_agua
                        }</h4><h4>Data coleta: ${b.data_coleta}<h4></div>`
                    });
                    console.log('objeto ', b);
                    marker.addListener('click', function() {
                        infoWindow.open(map, marker);
                    });
                }
            });
        })

}

const urlParams = new URLSearchParams(window.location.search);
const search = urlParams.get('q');
document.getElementById('searchInput').value = search;
