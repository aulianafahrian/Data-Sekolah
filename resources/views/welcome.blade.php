<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        #map {
            height: 500px;
            z-index: 0;
        }
    </style>
    <style>
        #pagination {
            list-style: none;
            display: flex;
            padding: 0;
        }

        .page-item {
            cursor: pointer;
            border: 1px solid #ddd;
            margin: 0 2px;
            padding: 8px 16px;
            transition: background-color 0.3s;
        }
    </style>

    <title>Data Sekolah Kabupaten Tabalong</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('asset/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/assets/css/templatemo-grad-school.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/assets/css/lightbox.css') }}">
</head>

<body>
    <!--header-->
    <header class="main-header clearfix" role="header">
        <div class="logo">
            <a href="#"><em>Data</em> Sekolah</a>
        </div>
        <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
        <nav id="menu" class="main-nav" role="navigation">
            <ul class="main-menu">
                <li><a href="#section1">Home</a></li>
                <li><a href="#section2">Peta</a></li>
                <li><a href="#section3">Data Sekolah</a></li>
                <!-- <li><a href="{{ url('/home') }}">Homies</a></li>
                <li><a href="{{ route('login') }}">Login</a></li> -->

            </ul>
            <!-- @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                @endauth
            </div>
            @endif -->
        </nav>
    </header>

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
            <source src="{{ asset('asset/assets/images/course-video.mp4') }}" type="video/mp4" />
        </video>

        <div class="video-overlay header-text">
            <div class="caption">
                <h2>Data Sekolah Kabupaten Tabalong</h2>
                <div class="main-button">
                    <div class="scroll-to-section"><a href="#section2">Lihat Peta</a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->


    <!-- <section class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <div class="features-post">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa fa-pencil"></i>All Courses</h4>
                            </div>
                            <div class="content-hide">
                                <p>Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere imperdiet.
                                    Donec maximus elementum ex. Cras convallis ex rhoncus, laoreet libero eu, vehicula libero.</p>
                                <p class="hidden-sm">Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a
                                    posuere imperdiet.</p>
                                <div class="scroll-to-section"><a href="#section2">More Info.</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="features-post second-features">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa fa-graduation-cap"></i>Virtual Class</h4>
                            </div>
                            <div class="content-hide">
                                <p>Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere imperdiet.
                                    Donec maximus elementum ex. Cras convallis ex rhoncus, laoreet libero eu, vehicula libero.</p>
                                <p class="hidden-sm">Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a
                                    posuere imperdiet.</p>
                                <div class="scroll-to-section"><a href="#section3">Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="features-post third-features">
                        <div class="features-content">
                            <div class="content-show">
                                <h4><i class="fa fa-book"></i>Real Meeting</h4>
                            </div>
                            <div class="content-hide">
                                <p>Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a posuere imperdiet.
                                    Donec maximus elementum ex. Cras convallis ex rhoncus, laoreet libero eu, vehicula libero.</p>
                                <p class="hidden-sm">Curabitur id eros vehicula, tincidunt libero eu, lobortis mi. In mollis eros a
                                    posuere imperdiet.</p>
                                <div class="scroll-to-section"><a href="#section4">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <section class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Peta Kabupaten Tabalong</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div style="display: flex;">
                        <div class="pr-3" style="width: 150px">
                            <select class="custom-select" id="pilihmap">
                                <option selected value="street">Street</option>
                                <option value="hybrid">Hybrid</option>
                                <option value="satellite">Satellite</option>
                                <option value="terrain">Terrain</option>
                            </select>
                        </div>
                        <div class="pr-3" style="width: 150px">
                            <select class="custom-select" id="filterkecamatan">
                                <option value="">Pilih Kecamatan</option>
                                @if ($kecamatans)
                                @foreach ($kecamatans as $kecamatan)
                                <option value="{{ $kecamatan['kecamatan'] }}">{{ $kecamatan['kecamatan'] }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="pr-3" style="width: 150px">
                            <select class="custom-select" id="filterjenjang">
                                <option value="">Semua Jenjang</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section coming-soon" data-section="section3">
        <div class="container">
            <div style="display: flex; margin-bottom: 20px;">
                <div class="pr-3" style="width: 150px">
                    <select class="custom-select" id="filterkecamatanTable">
                        <option value="">Semua Kecamatan</option>
                        @if ($kecamatans)
                        @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan['kecamatan'] }}">{{ $kecamatan['kecamatan'] }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="pr-3" style="width: 150px">
                    <select class="custom-select" id="filterjenjangTable">
                        <option value="">Semua Jenjang</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                    </select>
                </div>
            </div>
            <div class="card">
                <table class="table" id="sekolahTable">
                    <thead>
                        <tr>
                            <th>Nama Sekolah</th>
                            <th>Jenjang</th>
                            <th>Alamat Sekolah</th>
                            <th>Kecamatan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sekolahs as $key => $sekolah)
                        <tr>
                            <td>{{ $sekolah->nama_sekolah }}</td>
                            <td>{{ $sekolah->jenjang }}</td>
                            <td>{{ $sekolah->alamat }}</td>
                            <td>{{ $sekolah->kecamatan }}</td>
                            <td>
                                <button id="btn-lihat" class="btn-lihat btn btn-success" data-lat="{{ $sekolah->latitude }}" data-lng="{{ $sekolah->longitude }}">Lihat</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <ul id="pagination" class="align-middle d-flex justify-content-center align-items-center mt-3 mb-3">
                    <li id="prevPage" class="page-item page-link">Previous</li>
                    <li id="currentPage" class="page-item page-link">1</li>
                    <li id="nextPage" class="page-item page-link"> Next </;>
                </ul>

            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><i class="fa fa-copyright"></i> Copyright 2024 by Anganaufea

                        | Design: <a href="#" rel="sponsored" target="_parent">TemplateMo</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('asset/vendor/jquery/jquery.min.js') }}"></script>
    <!-- <script src="{{ asset('asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->

    <script src="{{ asset('asset/assets/js/isotope.min.js') }}"></script>
    <script src="{{ asset('asset/assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('asset/assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('asset/assets/js/tabs.js') }}"></script>
    <script src="{{ asset('asset/assets/js/video.js') }}"></script>
    <script src="{{ asset('asset/assets/js/slick-slider.js') }}"></script>
    <script src="{{ asset('asset/assets/js/custom.js') }}"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .scroll-to-section').on('click', 'a', function(e) {
            if ($(e.target).hasClass('external')) {
                return;
            }
            e.preventDefault();
            $('#menu').removeClass('active');
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>



    <script>
        let coordinateArray = [-2.1719983923537263, 115.41368420623023];
        var map = L.map('map').setView(coordinateArray, 17);

        const pilihmap = document.getElementById('pilihmap');
        const filterKecamatan = document.getElementById('filterkecamatan');
        const filterJenjang = document.getElementById('filterjenjang');

        var baseLayer = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
        }).addTo(map);

        pilihmap.addEventListener("change", () => {
            let mapvalue = pilihmap.value;
            var lyrs = '';
            if (mapvalue == 'street') {
                lyrs = 'm';
            }
            if (mapvalue == 'hybrid') {
                lyrs = 's,h';
            }
            if (mapvalue == 'satellite') {
                lyrs = 's';
            }
            if (mapvalue == 'terrain') {
                lyrs = 'p';
            }
            baseLayer.setUrl('http://{s}.google.com/vt?lyrs=' + lyrs + '&x={x}&y={y}&z={z}');
        });

        const hideStyle = {
            opacity: 0,
            fillOpacity: 0
        };

        const sekolahs = @json($sekolahs);
        const kecamatans = @json($kecamatans);

        // Function to filter sekolahs on the map by Jenjang
        function updateMapByJenjang() {
            // Get selected Jenjang value
            let selectedJenjang = filterJenjang.value;

            // Filter sekolahs by Jenjang
            let filteredSekolahs = sekolahs.filter(function(sekolah) {
                return !selectedJenjang || sekolah.jenjang === selectedJenjang;
            });

            // Clear existing markers
            map.eachLayer(function(layer) {
                if (layer instanceof L.Marker) {
                    map.removeLayer(layer);
                }
            });

            // Add markers for filtered sekolahs
            filteredSekolahs.forEach(function(sekolah) {
                L.marker([sekolah.latitude, sekolah.longitude]).addTo(map)
                    .bindPopup('<b>' + sekolah.nama_sekolah + '</b><br>' + sekolah.kecamatan + '<br>' + sekolah.jenjang + '<br>' + sekolah.alamat);
            });
        }

        // Initial rendering of the map with all sekolahs
        updateMapByJenjang();

        // Event listener for Jenjang filter on the map
        filterJenjang.addEventListener('change', function() {
            updateMapByJenjang();
        });

        if (filterKecamatan) {
            filterKecamatan.addEventListener('change', function() {
                let selectedKecamatan = this.value;
                let data = kecamatans.filter(function(item) {
                    return item.kecamatan === selectedKecamatan;
                });

                if (data && data.length > 0) {
                    console.log(data);
                    let coordinateArray = [data[0].lat, data[0].long];
                    // Assume 'map' is the variable containing your map object
                    map.setView(coordinateArray, 15);
                } else {
                    console.error('Data kecamatan tidak ditemukan.');
                }
            });
        }
    </script>


    <script>
        const filterKecamatanTable = document.getElementById('filterkecamatanTable');
        const filterJenjangTable = document.getElementById('filterjenjangTable');
        const sekolahTable = document.getElementById('sekolahTable');

        // const sekolahs = @json($sekolahs);

        // Function to filter sekolahs for the table
        function filterSekolahsForTable(kecamatan, jenjang) {
            return sekolahs.filter(function(sekolah) {
                return (!kecamatan || sekolah.kecamatan === kecamatan) &&
                    (!jenjang || sekolah.jenjang === jenjang);
            });
        }

        const pageSize = 10; // Number of records per page
        let currentPage = 1;

        function updatePaginationText() {
            document.getElementById('currentPage').textContent = `Page ${currentPage}`;
        }

        function updateTableWithPagination() {
            let selectedKecamatan = filterKecamatanTable.value;
            let selectedJenjang = filterJenjangTable.value;

            // Filter sekolahs by selected Kecamatan and Jenjang
            let filteredSekolahs = filterSekolahsForTable(selectedKecamatan, selectedJenjang);

            // Calculate start and end index for the current page
            let startIndex = (currentPage - 1) * pageSize;
            let endIndex = startIndex + pageSize;

            // Display only the records for the current page
            let pageSekolahs = filteredSekolahs.slice(startIndex, endIndex);

            // Clear existing table content
            sekolahTable.innerHTML = "";

            // Add table header
            let tableHeader = "<thead><tr><th>Nama Sekolah</th><th>Jenjang</th><th>Alamat Sekolah</th><th>Kecamatan</th><th>Actions</th></tr></thead>";
            sekolahTable.insertAdjacentHTML('beforeend', tableHeader);

            // Add table rows
            pageSekolahs.forEach(function(sekolah) {
                let tableRow = `<tr>
                <td>${sekolah.nama_sekolah}</td>
                <td>${sekolah.jenjang}</td>
                <td>${sekolah.alamat}</td>
                <td>${sekolah.kecamatan}</td>
                <td>
                    <button id="btn-lihat" class="btn-lihat btn btn-success" data-lat="${sekolah.latitude}" data-lng="${sekolah.longitude}">Lihat</button>
                </td>
            </tr>`;
                sekolahTable.insertAdjacentHTML('beforeend', tableRow);
            });

            updatePaginationText();
        }

        // Initial rendering of the table with pagination
        updateTableWithPagination();

        // Event listeners for filter options on the table
        filterKecamatanTable.addEventListener('change', function() {
            currentPage = 1; // Reset to the first page when filters change
            updateTableWithPagination();
        });

        filterJenjangTable.addEventListener('change', function() {
            currentPage = 1; // Reset to the first page when filters change
            updateTableWithPagination();
        });

        // Event listeners for pagination buttons
        document.getElementById('prevPage').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                updateTableWithPagination();
            }
        });

        document.getElementById('nextPage').addEventListener('click', function() {
            let selectedKecamatan = filterKecamatanTable.value;
            let selectedJenjang = filterJenjangTable.value;
            let filteredSekolahs = filterSekolahsForTable(selectedKecamatan, selectedJenjang);

            let totalPages = Math.ceil(filteredSekolahs.length / pageSize);

            if (currentPage < totalPages) {
                currentPage++;
                updateTableWithPagination();
            }
        });
    </script>

    <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const btnLihatList = document.querySelectorAll('.btn-lihat');

            let currentMarkerData = {}; // Variabel untuk menyimpan data terkini

            btnLihatList.forEach(function(btnLihat) {
                btnLihat.addEventListener('click', function() {
                    // Ambil data dari tombol yang diklik
                    const lat = parseFloat(btnLihat.getAttribute('data-lat'));
                    const lng = parseFloat(btnLihat.getAttribute('data-lng'));
                    const namaSekolah = btnLihat.closest('tr').querySelector('td:first-child').textContent;
                    const kecamatan = btnLihat.closest('tr').querySelector('td:nth-child(4)').textContent;

                    // Simpan data terkini
                    currentMarkerData = {
                        lat: lat,
                        lng: lng,
                        namaSekolah: namaSekolah,
                        kecamatan: kecamatan
                    };

                    // Pindah ke section2
                    showSection('#section2', true);

                    // Tampilkan marker pada peta
                    map.setView([lat, lng], 17);
                    createMarker(currentMarkerData); // Fungsi untuk membuat marker
                });
            });

            // Fungsi untuk membuat marker
            function createMarker(data) {
                // Hapus marker sebelumnya jika ada
                if (currentMarker) {
                    map.removeLayer(currentMarker);
                }

                // Buat dan tambahkan marker baru
                currentMarker = L.marker([data.lat, data.lng]).addTo(map)
                    .bindPopup('<b>' + data.namaSekolah + '</b><br>' + data.kecamatan);
            }
        });
    </script> -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sekolahTable = document.getElementById('sekolahTable');

            // Tambahkan event listener pada tabel dan gunakan event delegation
            sekolahTable.addEventListener('click', function(event) {
                // Periksa apakah elemen yang diklik adalah tombol dengan kelas 'btn-lihat'
                if (event.target.classList.contains('btn-lihat')) {
                    // Dapatkan data dari tombol yang diklik
                    const lat = parseFloat(event.target.dataset.lat);
                    const lng = parseFloat(event.target.dataset.lng);

                    // Pindah ke marker yang dipilih
                    map.setView([lat, lng], 17);

                    // Tampilkan popup marker
                    map.eachLayer(function(layer) {
                        if (layer instanceof L.Marker) {
                            if (layer.getLatLng().lat === lat && layer.getLatLng().lng === lng) {
                                layer.openPopup();
                            }
                        }
                    });

                    // Pindah ke section2
                    showSection('#section2', true);
                }
            });
        });
    </script>




</body>

</html>