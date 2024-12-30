<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Magna Parametre Formu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #ff0000;
            --background-color: #dcdcdc;
            --border-radius: 8px;
            --box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--background-color);
            padding: 20px 0;
        }

        .form-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .form-control {
            transition: border-color 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
        }

        .btn {
            transition: transform 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .section-title {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .row {
            margin-bottom: 1rem;
        }

        /* Animation for new elements */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .new-element {
            animation: fadeIn 0.3s ease;
        }
    </style>
</head>
<body class="font-sans antialiased dark:bg-black dark:text-white/50">

<div class="container">
    <div class="row">
        <div class="col">
            <h3 class="mt-6 text-center"><img src="https://www.taysad.org.tr/Uploads/UyeLogo/050720211411232magna_logo1.png" alt="Magna"></h1>
                <hr>
        </div>
    </div>
    <form id="parametreForm" method="POST" action="{{route('excel_form')}}" class="container my-4">
        @csrf
        <h1 class="text-center mb-4">Parametre Takip Formu</h2>

            <!-- Üst Bölüm -->
            <div class="row mb-3">
                <div class="col-md-6 mt-2">
                    <label for="urunAdi" class="form-label">Ürün Adı</label>
                    <input type="text" class="form-control" id="urunAdi" name="urunAdi" placeholder="Ürün Adını Girin">
                </div>

                <div class="col-md-6 mt-2">
                    <label for="makina" class="form-label">Makine</label>
                    <input type="text" class="form-control" id="makina" name="makina" placeholder="Makina Adını Girin">
                </div>
            </div>

            <!-- Diğer Alanlar -->
            <div class="row mb-3">
                <div class="col-md-6 mt-2">
                    <label for="kurutma" class="form-label">Kurutma Derecesi</label>
                    <input type="text" class="form-control" id="kurutma" name="kurutma" placeholder="Kurutma">
                </div>
                <div class="col-md-6 mt-2">
                    <label for="cycleTime" class="form-label">Cycle Time</label>
                    <input type="text" class="form-control" id="cycleTime" name="cycleTime" placeholder="Süre Girin">
                </div>
                <div class="col-md-6 mt-3">
                    <label for="agirlik" class="form-label">Parça Ağırlık</label>
                    <input type="text" class="form-control" id="agirlik" name="agirlik" placeholder="Ağırlık Girin">
                </div>
                <div class="col-md-6 mt-3">
                    <label for="hammadde" class="form-label">Hammadde</label>
                    <input type="text" class="form-control" id="hammadde" name="hammadde" placeholder="Hammadde Adı/Kodu">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mt-2">
                    <label for="cycleTime" class="form-label">Enjeksiyon Süresi</label>
                    <input type="text" class="form-control" id="enjeksiyonSuresi" name="enjeksiyonSuresi" placeholder="Süre Girin">
                </div>
                <div class="col-md-6 mt-2">
                    <label for="cycleTime" class="form-label">Soğutma Süresi</label>
                    <input type="text" class="form-control" id="sogutmaSuresi" name="sogutmaSuresi" placeholder="Süre Girin">
                </div>
                <div class="col-md-6 mt-3">
                    <label for="cycleTime" class="form-label">Mal Alma Zamanı</label>
                    <input type="text" class="form-control" id="malAlmaZamani" name="malAlmaZamani" placeholder="Süre Girin">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6 mt-2">
                    <label for="cycleTime" class="form-label">Verilen Enjeksiyon Basıncı (Bar) </label>
                    <input type="text" class="form-control" id="verilenBasinc" name="verilenBasinc" placeholder="Bar Girin">
                </div>
                <div class="col-md-6 mt-2">
                    <label for="cycleTime" class="form-label">Gerçekleşen Enjeksiyon Basıncı (Bar) </label>
                    <input type="text" class="form-control" id="gerceklesenBasinc" name="gerceklesenBasinc" placeholder="Bar Girin">
                </div>
            </div>
            <hr>
            &nbsp;
            &nbsp;
            &nbsp;

            <!-- Sıralı Yolluklar -->
            <div class="container mt-4"  style="margin-left: -1%;">
                <h3 class="section-title">Sıralı Yolluklar</h1>
        <div id="input-container">
            <!-- İlk Yolluk Grubu -->
            <div class="row g-3 mb-3">
                <div class="col-md-3">
                    <label class="form-label">1. Kademe Açma</label>
                    <input type="text" class="form-control decimal" name="kademe1_acma[]" placeholder="Açma Süresi">
                </div>
                <div class="col-md-3">
                    <label class="form-label">1. Kademe Kapama</label>
                    <input type="text" class="form-control decimal" name="kademe1_kapama[]" placeholder="Kapama Süresi">
                </div>
                <div class="col-md-3">
                    <label class="form-label">2. Kademe Açma</label>
                    <input type="text" class="form-control decimal" name="kademe2_acma[]" placeholder="Açma Süresi">
                </div>
                <div class="col-md-3">
                    <label class="form-label">2. Kademe Kapama</label>
                    <input type="text" class="form-control decimal" name="kademe2_kapama[]" placeholder="Kapama Süresi">
                </div>
            </div>
        </div>
        <a class="btn btn-danger btn-sm" id="add-group-btn">+ Yolluk Ekle</a>
</div>
<hr>
&nbsp;
&nbsp;
&nbsp;

<!-- Cooler Set Degree Section -->
<div class="mb-3 mt-4">
    <h3 class="section-title" >Soğutucu Set Derecesi</h2>
        <div id="cooler-container">
            <div class="row g-3 mb-3">
                <!-- Fixed Inputs -->
                <div class="col-md-3">
                    <label class="form-label">Sabit 1</label>
                    <input type="text" class="form-control" name="sabit_sogutucu" placeholder="Isı Değeri">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Hareketli 1</label>
                    <input type="text" class="form-control" name="hareketli_soğutucu" placeholder="Isı Değeri">
                </div>

            </div>
        </div>
</div>
<hr>
&nbsp;
&nbsp;
&nbsp;

<!-- Enjeksiyon Hızları ve Mesafeleri -->
<div class="container mt-4" style="margin-left: -1%;">
    <h3 class="section-title">Enjeksiyon Hızları ve Mesafeleri</h1>
        <div id="injection-container">
            <!-- İlk Satır -->
            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <label class="form-label">Pos</label>
                    <input type="text" class="form-control" name="injection_pos[]" placeholder="Pozisyon">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Speed</label>
                    <input type="text" class="form-control" name="injection_speed[]" placeholder="Hız">
                </div>
            </div>
        </div>
        <a class="btn btn-danger btn-sm" id="add-injection-btn">+ Pozisyon Hız Ekle</a>
</div>
<hr>
&nbsp;
&nbsp;
&nbsp;

<div class="container mt-3">
    <!-- Tutma Başlangıcı (MM) Input -->
    <!-- Tutma Section -->
    <div class="mb-4" style="margin-left: -1%;">
        <h3 class="section-title">Tutma Parametreleri</h2>
            <label for="tutmaBaslangici" class="form-label"><strong>Tutma Başlangıcı (MM)</strong></label>
            <input type="text" id="tutmaBaslangici" name="tutmaBaslangici" class="form-control" placeholder="Tutma Başlangıcı">
    </div>
    <div id="tutma-container" style="margin-left: -1%;">
        <!-- First Tutma Group -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">Zaman 1 (sn)</label>
                <input type="text" class="form-control" name="tutma_zaman[]" placeholder="Zaman değeri">
            </div>
            <div class="col-md-6">
                <label class="form-label">Basınç 1 (Bar)</label>
                <input type="text" step="0.01" class="form-control" name="tutma_basinc[]" placeholder="Basınç değeri">
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-danger btn-sm" id="add-tutma-btn" style="margin-left: -1%;">
        + Tutma Parametresi Ekle
    </button>
</div>
<hr>
&nbsp;
&nbsp;
&nbsp;

<!-- Yastık ve Geri Emiş Alanları -->
<div class="mt-3">
    <div class="row">
        <div class="col-6">
            <label>Yastık Miktarı (mm):</label>
            <input type="text" class="form-control" name="yastikMiktari" id="yastikMiktari" placeholder="Yastık Miktarı">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <label>1- Geri Emiş Önce (mm):</label>
            <input type="text" class="form-control" name="geriEmisOnce1" id="geriEmisOnce1" placeholder="Geri Emiş Önce">
        </div>
        <div class="col-6">
            <label>1- Geri Emiş Sonra (mm):</label>
            <input type="text" class="form-control" name="geriEmisSonra1" id="geriEmisSonra1" placeholder="Geri Emiş Sonra">
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-6">
            <label>Önce Hız:</label>
            <input type="text" class="form-control" name="geriEmisOnce2" id="geriEmisOnce2" placeholder="Geri Emiş Önce">
        </div>
        <div class="col-6">
            <label>Sonra Hız:</label>
            <input type="text" class="form-control" name="geriEmisSonra2" id="geriEmisSonra2" placeholder="Geri Emiş Sonra">
        </div>
    </div>
</div>
<hr>
&nbsp;
&nbsp;
&nbsp;

<!--Mal Alma-->
<div class="container mt-4" style="margin-left: -1%;">
    <h3 class="section-title">Mal Alma</h1>
        <div id="distance-container">
            <!-- First Distance Group -->
            <div class="row g-3 mb-3">
                <div class="col-12">
                    <h5>Mesafe 1</h5>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Hız (mm/sn)</label>
                    <input type="text" class="form-control" name="hiz[]" placeholder="Hız değeri">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Geri Basınç (B/Prbar)</label>
                    <input type="text" class="form-control" name="basinc[]" placeholder="Basınç değeri">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Yol -s (mm)</label>
                    <input type="text" class="form-control" name="yol[]" placeholder="Yol değeri">
                </div>
            </div>
        </div>
        <a class="btn btn-danger btn-sm" id="add-distance-btn">+ Mesafe Ekle</a>
</div>
<hr>
&nbsp;
&nbsp;
&nbsp;

<div class="container mt-4" style="margin-left: -1%;">
    <h3 class="section-title text-left">Silindir Isıları</h2>
        <div id="cylindir_tempreture-container">
            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <label class="form-label">1</label>
                    <input type="text" class="form-control" name="silindir_isi_1" placeholder="Isı Değeri">
                </div>
                <div class="col-md-4">
                    <label class="form-label">2</label>
                    <input type="text" class="form-control" name="silindir_isi_2" placeholder="Isı Değeri">
                </div>
                <div class="col-md-4">
                    <label class="form-label">3</label>
                    <input type="text" class="form-control" name="silindir_isi_3" placeholder="Isı Değeri">
                </div>

                <div class="col-md-4">
                    <label class="form-label">4</label>
                    <input type="text" class="form-control" name="silindir_isi_4" placeholder="Isı Değeri">
                </div>
                <div class="col-md-4">
                    <label class="form-label">5</label>
                    <input type="text" class="form-control" name="silindir_isi_5" placeholder="Isı Değeri">
                </div>
                <div class="col-md-4">
                    <label class="form-label">6</label>
                    <input type="text" class="form-control" name="silindir_isi_6" placeholder="Isı Değeri">
                </div>

                <div class="col-md-4">
                    <label class="form-label">7</label>
                    <input type="text" class="form-control" name="silindir_isi_7" placeholder="Isı Değeri">
                </div>
                <div class="col-md-4">
                    <label class="form-label">8</label>
                    <input type="text" class="form-control" name="silindir_isi_8" placeholder="Isı Değeri">
                </div>
                <div class="col-md-4">
                    <label class="form-label">9</label>
                    <input type="text" class="form-control" name="silindir_isi_9" placeholder="Isı Değeri">
                </div>

                <div class="col-md-4">
                    <label class="form-label">10</label>
                    <input type="text" class="form-control" name="silindir_isi_10" placeholder="Isı Değeri">
                </div>
                <div class="col-md-4">
                    <label class="form-label">11</label>
                    <input type="text" class="form-control" name="silindir_isi_11" placeholder="Isı Değeri">
                </div>
            </div>
        </div>
        <hr>
        &nbsp;
        &nbsp;
        &nbsp;


        <h3 class="section-title text-left" style="margin-left: 0%;">Sıcak Yolluk Isıları (Hot Runner)</h2>
            <div id="hotrunner-container">
                <!-- First Hot Runner Group -->
                <div class="row g-3 mb-3">
                    <div class="col-md-2">
                        <label class="form-label">H1</label>
                        <input type="text" class="form-control" name="hotrunner[]" placeholder="Isı Değeri">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">H2</label>
                        <input type="text" class="form-control" name="hotrunner[]" placeholder="Isı Değeri">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">H3</label>
                        <input type="text" class="form-control" name="hotrunner[]" placeholder="Isı Değeri">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">H4</label>
                        <input type="text" class="form-control" name="hotrunner[]" placeholder="Isı Değeri">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">H5</label>
                        <input type="text" class="form-control" name="hotrunner[]" placeholder="Isı Değeri">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">H6</label>
                        <input type="text" class="form-control" name="hotrunner[]" placeholder="Isı Değeri">
                    </div>
                </div>
            </div>
            <a class="btn btn-danger btn-sm" id="add-hotrunner-btn">+ Sıcak Yolluk Ekle</a>
</div>
<hr>
&nbsp;
&nbsp;
&nbsp;


<!--KAPAMA / (CLOSING) - MOLD / (KALIP) UNIT-->
<div class="container mt-4" style="margin-left: -1%;">
    <h3 class="section-title">Kapama / (Closing) - Mold / (Kalıp) Unit</h1>
        <div class="mb-3">
            <label for="tutmaBaslangici" class="form-label"><strong>Kalıp Kapama Kuvveti (KN)</strong></label>
            <input type="text" name="kalipKapamaKuvveti" id="kalipKapamaKuvveti" class="form-control" placeholder="Kapama Kuvveti (KN)">
        </div>
        <div class="container mt-4" style="margin-left: -1%;">
            <!-- Mold Opening -->
            <h5 class="mb-4 text-left">Kalıp Açma</h2>
                <div id="mold-opening-container">
                    <!-- First Input Group -->
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Mesafe 1</label>
                            <input type="text" class="form-control" name="acma_mesafesi[]" placeholder="Mesafe Değeri">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Hız 1</label>
                            <input type="text" class="form-control" name="acma_hizi[]" placeholder="Hız Değeri">
                        </div>
                    </div>
                </div>
                <a class="btn btn-danger btn-sm" id="add-opening-btn">+ Açma Mesafesi Ekle</a>
        </div>
</div>
&nbsp;
&nbsp;
&nbsp;


<!-- Gönder Butonu -->
<div class="text-center mt-4">
    <button type="submit" class="btn btn-success">Dosya İndir</button>
</div>
</form>
</div>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <hr>
            <small class="text-muted">Making by Erhan Akca</small>
        </div>
    </div>
</div>
<script>

    // Sıralı Yolluklar için yeni grup ekleme
    const groupTemplate = `
        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label class="form-label">1. Kademe Açma</label>
                <input type="text" class="form-control" name="kademe1_acma[]" placeholder="Açma Süresi">
            </div>
            <div class="col-md-3">
                <label class="form-label">1. Kademe Kapama</label>
                <input type="text" class="form-control" name="kademe1_kapama[]" placeholder="Kapama Süresi">
            </div>
            <div class="col-md-3">
                <label class="form-label">2. Kademe Açma</label>
                <input type="text" class="form-control" name="kademe2_acma[]" placeholder="Açma Süresi">
            </div>
            <div class="col-md-3">
                <label class="form-label">2. Kademe Kapama</label>
                <input type="text" class="form-control" name="kademe2_kapama[]" placeholder="Kapama Süresi">
            </div>
        </div>
    `;

    // Enjeksiyon Hızları için yeni satır ekleme
    const injectionRowTemplate = `
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label class="form-label">POS</label>
                <input type="text" class="form-control" name="injection_pos[]" placeholder="Pozisyon">
            </div>
            <div class="col-md-6">
                <label class="form-label">SPEED</label>
                <input type="text" class="form-control" name="injection_speed[]" placeholder="Hız">
            </div>
        </div>
    `;

    // Event Listeners
    document.getElementById('add-group-btn').addEventListener('click', () => {
        document.getElementById('input-container').insertAdjacentHTML('beforeend', groupTemplate);
    });

    document.getElementById('add-injection-btn').addEventListener('click', () => {
        document.getElementById('injection-container').insertAdjacentHTML('beforeend', injectionRowTemplate);
    });

    document.getElementById('add-distance-btn').addEventListener('click', function() {
        const container = document.getElementById('distance-container');
        const groupCount = container.getElementsByClassName('row').length + 1;

        const newGroup = document.createElement('div');
        newGroup.className = 'row g-3 mb-3';
        newGroup.innerHTML = `
        <div class="col-12">
            <h5>Mesafe ${groupCount}</h5>
        </div>
        <div class="col-md-4">
            <label class="form-label">Hız (mm/sn)</label>
            <input type="text" class="form-control" name="hiz[]" placeholder="Hız değeri">
        </div>
        <div class="col-md-4">
            <label class="form-label">Geri Basınç (B/Prbar)</label>
            <input type="text" class="form-control" name="basinc[]" placeholder="Basınç değeri">
        </div>
        <div class="col-md-4">
            <label class="form-label">Yol -s (mm)</label>
            <input type="text" class="form-control" name="yol[]" placeholder="Yol değeri">
        </div>
    `;

        container.appendChild(newGroup);
    });

    document.getElementById('add-hotrunner-btn').addEventListener('click', function() {
        const container = document.getElementById('hotrunner-container');
        const groupCount = container.getElementsByClassName('row').length;
        const starttext = (groupCount * 6) + 1;

        // Check if we've reached the limit (H55)
        if (starttext > 55) {
            alert('Maksimum sıcak yolluk sayısına ulaşıldı (H55)');
            return;
        }

        const newGroup = document.createElement('div');
        newGroup.className = 'row g-3 mb-3';

        // Calculate how many inputs to add in this group
        const remainingInputs = Math.min(6, 55 - starttext + 1);

        let inputsHTML = '';
        for (let i = 0; i < remainingInputs; i++) {
            const currenttext = starttext + i;
            inputsHTML += `
            <div class="col-md-2">
                <label class="form-label">H${currenttext}</label>
                <input type="text" class="form-control" name="hotrunner[]" placeholder="Isı Değeri">
            </div>
        `;
        }

        newGroup.innerHTML = inputsHTML;
        container.appendChild(newGroup);
    });

    document.getElementById('add-opening-btn').addEventListener('click', function() {
        const container = document.getElementById('mold-opening-container');
        const groupCount = container.getElementsByClassName('row').length + 1;

        const newGroup = document.createElement('div');
        newGroup.className = 'row g-3 mb-3';
        newGroup.innerHTML = `
        <div class="col-md-6">
            <label class="form-label">Mesafe ${groupCount}</label>
            <input type="text" class="form-control" name="acma_mesafesi[]" placeholder="Mesafe Değeri">
        </div>
        <div class="col-md-6">
            <label class="form-label">Hız ${groupCount}</label>
            <input type="text" class="form-control" name="acma_hizi[]" placeholder="Hız Değeri">
        </div>
    `;

        container.appendChild(newGroup);
    });

    document.getElementById('add-tutma-btn').addEventListener('click', function() {
        const container = document.getElementById('tutma-container');
        const groupCount = container.getElementsByClassName('row').length + 1;

        const newGroup = document.createElement('div');
        newGroup.className = 'row g-3 mb-3';
        newGroup.innerHTML = `
        <div class="col-md-6">
            <label class="form-label">Zaman ${groupCount} (sn)</label>
            <input type="text" class="form-control" name="tutma_zaman[]" placeholder="Zaman değeri">
        </div>
        <div class="col-md-6">
            <label class="form-label">Basınç ${groupCount} (Bar)</label>
            <input type="text" step="0.01" class="form-control" name="tutma_basinc[]" placeholder="Basınç değeri">
        </div>
    `;

        container.appendChild(newGroup);
    });


</script>
</body>
</html>
