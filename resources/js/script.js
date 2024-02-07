sekolahs.forEach(function(sekolah) {
    L.marker([sekolah.latitude, sekolah.longitude]).addTo(map)
        .bindPopup('<b>' + sekolah.nama_sekolah + '</b><br>' + sekolah.kecamatan);
});
