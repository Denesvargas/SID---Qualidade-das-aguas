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
    // The location of Uluru
    const geoRS = { lat: -29.701, lng:  -53.718 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: geoRS,
    });

    fetch('/pesquisa')
        .then(r => r.json())
        .then(json => {
            json.forEach(b => {
                if (!!b && !!b.latitude_s) {
                    const geo = dmsToDd({lat: b.latitude_s, lng: b.longitude_o});
                    const marker = new google.maps.Marker({position: geo, map});
                }
            });
        })

}
