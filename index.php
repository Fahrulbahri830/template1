<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan - Budi & Sari</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Montserrat:wght@300;400;500;600&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="overlay" id="overlay">
        <div class="invitation-card">
            <div class="card-content">
                <h1 class="nama-mempelai">Budi & Sari</h1>
                <p class="undangan-text">Dengan hormat mengundang Bapak/Ibu/Saudara/i</p>
                <p class="tamu-nama" id="nama-tamu">Yang Terhormat</p>
                <button class="open-invitation" id="open-invitation">
                    <i class="fas fa-envelope-open"></i> Buka Undangan
                </button>
            </div>
        </div>
    </div>

    <header class="hero" id="home">
        <div class="hero-content">
            <div class="ornament top-left"></div>
            <div class="ornament top-right"></div>
            <p class="bismillah">بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم</p>
            <h2 class="undangan-text">Undangan Pernikahan</h2>
            <h1 class="nama-mempelai">Budi & Sari</h1>
            <p class="tanggal-pernikahan">Minggu, 27 Agustus 2026</p>
            <div class="ornament bottom-left"></div>
            <div class="ornament bottom-right"></div>
        </div>
    </header>

    <nav class="navigation">
        <ul>
            <li><a href="#home"><i class="fas fa-home"></i><span>Home</span></a></li>
            <li><a href="#mempelai"><i class="fas fa-heart"></i><span>Mempelai</span></a></li>
            <li><a href="#acara"><i class="fas fa-calendar-alt"></i><span>Acara</span></a></li>
            <li><a href="#galeri"><i class="fas fa-images"></i><span>Galeri</span></a></li>
            <li><a href="#peta"><i class="fas fa-map-marker-alt"></i><span>Lokasi</span></a></li>
            <li><a href="#ucapan"><i class="fas fa-comments"></i><span>Ucapan</span></a></li>
        </ul>
    </nav>

    <section class="quote-section">
        <div class="container">
            <div class="quote">
                "Dan di antara tanda-tanda kekuasaan-Nya ialah Dia menciptakan untukmu pasangan-pasangan dari jenismu sendiri, supaya kamu cenderung dan merasa tenteram kepadanya, dan dijadikan-Nya diantaramu rasa kasih dan sayang. Sesungguhnya pada yang demikian itu benar-benar terdapat tanda-tanda bagi kaum yang berfikir."
                <span class="quran-reference">QS. Ar-Rum : 21</span>
            </div>
        </div>
    </section>

    <section id="mempelai" class="mempelai-section">
        <div class="container">
            <h2 class="section-title">Mempelai</h2>
            <div class="batik-divider"></div>
            
            <div class="mempelai-wrapper">
                <div class="mempelai pria">
                    <div class="foto-wrapper">
                        <div class="foto-mempelai">
                            <!-- Placeholder for groom's photo -->
                        </div>
                    </div>
                    <h3>Budi Santoso, S.T.</h3>
                    <p class="mempelai-info">Putra pertama dari<br>Bapak Hendra Wijaya<br>&<br>Ibu Susanti</p>
                    <div class="social-media">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                
                <div class="mempelai-dan">
                    <span>&</span>
                </div>
                
                <div class="mempelai wanita">
                    <div class="foto-wrapper">
                        <div class="foto-mempelai">
                            <!-- Placeholder for bride's photo -->
                        </div>
                    </div>
                    <h3>Sari Indah, S.Pd.</h3>
                    <p class="mempelai-info">Putri kedua dari<br>Bapak Joko Widodo<br>&<br>Ibu Ani Yudhoyono</p>
                    <div class="social-media">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="countdown" class="countdown-section">
        <div class="container">
            <h2>Menuju Hari Bahagia</h2>
            <div class="countdown-container">
                <div class="countdown-item">
                    <div class="countdown-value" id="days">00</div>
                    <div class="countdown-label">Hari</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-value" id="hours">00</div>
                    <div class="countdown-label">Jam</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-value" id="minutes">00</div>
                    <div class="countdown-label">Menit</div>
                </div>
                <div class="countdown-item">
                    <div class="countdown-value" id="seconds">00</div>
                    <div class="countdown-label">Detik</div>
                </div>
            </div>
        </div>
    </section>

    <section id="acara" class="acara-section">
        <div class="container">
            <h2 class="section-title">Rangkaian Acara</h2>
            <div class="batik-divider"></div>
            
            <div class="acara-wrapper">
                <div class="acara-item akad">
                    <div class="acara-icon">
                        <i class="fas fa-mosque"></i>
                    </div>
                    <h3>Akad Nikah</h3>
                    <div class="acara-details">
                        <p><i class="far fa-calendar-alt"></i> Minggu, 27 Agustus 2026</p>
                        <p><i class="far fa-clock"></i> 08:00 - 10:00 WIB</p>
                        <p><i class="fas fa-map-marker-alt"></i> Masjid Al-Hikmah<br>Jl. Pahlawan No. 123, Jakarta</p>
                    </div>
                </div>
                
                <div class="acara-item resepsi">
                    <div class="acara-icon">
                        <i class="fas fa-glass-cheers"></i>
                    </div>
                    <h3>Resepsi</h3>
                    <div class="acara-details">
                        <p><i class="far fa-calendar-alt"></i> Minggu, 27 Agustus 2023</p>
                        <p><i class="far fa-clock"></i> 11:00 - 15:00 WIB</p>
                        <p><i class="fas fa-map-marker-alt"></i> Grand Ballroom Hotel Mulia<br>Jl. Merdeka No. 456, Jakarta</p>
                    </div>
                </div>
            </div>
            
            <div class="protokol-kesehatan">
                <h3>Protokol Kesehatan</h3>
                <div class="protokol-items">
                    <div class="protokol-item">
                        <i class="fas fa-head-side-mask"></i>
                        <p>Menggunakan Masker</p>
                    </div>
                    <div class="protokol-item">
                        <i class="fas fa-hands-wash"></i>
                        <p>Mencuci Tangan</p>
                    </div>
                    <div class="protokol-item">
                        <i class="fas fa-people-arrows"></i>
                        <p>Menjaga Jarak</p>
                    </div>
                    <div class="protokol-item">
                        <i class="fas fa-temperature-low"></i>
                        <p>Cek Suhu Tubuh</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="galeri" class="galeri-section">
        <div class="container">
            <h2 class="section-title">Galeri Foto</h2>
            <div class="batik-divider"></div>
            
            <div class="galeri-wrapper">
                <div class="galeri-item"></div>
                <div class="galeri-item"></div>
                <div class="galeri-item"></div>
                <div class="galeri-item"></div>
                <div class="galeri-item"></div>
                <div class="galeri-item"></div>
            </div>
        </div>
    </section>

    <section id="peta" class="peta-section">
        <div class="container">
            <h2 class="section-title">Peta Lokasi</h2>
            <div class="batik-divider"></div>
            
            <div class="peta-wrapper">
                <div class="peta">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.6664463317738!2d106.82496231476859!3d-6.175392395529992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5d2e764b12d%3A0x3d2ad6e1e0e9bcc8!2sMonumen%20Nasional!5e0!3m2!1sid!2sid!4v1627634031063!5m2!1sid!2sid" 
                    style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="peta-info">
                    <a href="https://goo.gl/maps/1JjQJx9xYsL2" target="_blank" class="btn btn-primary">
                        <i class="fas fa-map-marked-alt"></i> Buka Google Maps
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="ucapan" class="ucapan-section">
        <div class="container">
            <h2 class="section-title">RSVP & Ucapan</h2>
            <div class="batik-divider"></div>
            
            <div class="ucapan-form-wrapper">
                <form action="rsvp.php" method="post" id="rsvpForm">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" id="nama" name="nama" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Kehadiran</label>
                        <div class="radio-group">
                            <input type="radio" id="hadir" name="kehadiran" value="Hadir" required>
                            <label for="hadir">Hadir</label>
                            
                            <input type="radio" id="tidak-hadir" name="kehadiran" value="Tidak Hadir">
                            <label for="tidak-hadir">Tidak Hadir</label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="pesan">Ucapan & Doa</label>
                        <textarea id="pesan" name="pesan" rows="4" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
            
            <div class="ucapan-list">
                <h3>Ucapan & Doa dari Tamu</h3>
                <div class="ucapan-items" id="ucapan-items">
                    <?php
                    include 'includes/database.php';
                    
                    $sql = "SELECT * FROM rsvp ORDER BY created_at DESC LIMIT 10";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="ucapan-item">';
                            echo '<div class="ucapan-avatar">' . substr($row["nama"], 0, 1) . '</div>';
                            echo '<div class="ucapan-content">';
                            echo '<div class="ucapan-header">';
                            echo '<h4>' . htmlspecialchars($row["nama"]) . '</h4>';
                            echo '<span class="ucapan-kehadiran ' . strtolower(str_replace(' ', '-', $row["kehadiran"])) . '">' . $row["kehadiran"] . '</span>';
                            echo '</div>';
                            echo '<p class="ucapan-text">' . htmlspecialchars($row["pesan"]) . '</p>';
                            echo '<p class="ucapan-time">' . date('d M Y H:i', strtotime($row["created_at"])) . '</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="no-ucapan">Belum ada ucapan. Jadilah yang pertama memberikan ucapan!</p>';
                    }
                    
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </section>

    <section class="amplop-section">
        <div class="container">
            <h2 class="section-title">Amplop Digital</h2>
            <div class="batik-divider"></div>
            
            <p class="amplop-text">Doa restu Anda merupakan karunia yang sangat berarti bagi kami.<br>Namun, jika memberi adalah ungkapan tanda kasih, Anda dapat memberi kado secara cashless.</p>
            
            <div class="amplop-wrapper">
                <div class="amplop-item">
                    <div class="amplop-bank">
                        <img src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/1200px-BNI_logo.svg.png" alt="BNI">
                    </div>
                    <div class="amplop-detail">
                        <p class="bank-name">Bank BNI</p>
                        <p class="account-number">1234567890</p>
                        <p class="account-name">Budi Santoso</p>
                        <button class="btn btn-outline copy-btn" data-clipboard-text="1234567890">
                            <i class="fas fa-copy"></i> Salin
                        </button>
                    </div>
                </div>
                
                <div class="amplop-item">
                    <div class="amplop-bank">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Bank_Mandiri_logo_2016.svg/2560px-Bank_Mandiri_logo_2016.svg.png" alt="Mandiri">
                    </div>
                    <div class="amplop-detail">
                        <p class="bank-name">Bank Mandiri</p>
                        <p class="account-number">0987654321</p>
                        <p class="account-name">Sari Indah</p>
                        <button class="btn btn-outline copy-btn" data-clipboard-text="0987654321">
                            <i class="fas fa-copy"></i> Salin
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="thank-you">
                <h2>Terima Kasih</h2>
                <p>Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan hadir untuk memberikan doa restu kepada kami.</p>
                <h3 class="nama-mempelai">Budi & Sari</h3>
            </div>
        </div>
        <div class="copyright">
            <p>© 2025 Seainvite</p>
        </div>
    </footer>

    <div class="music-control">
        <button id="music-toggle">
            <i class="fas fa-music"></i>
        </button>
    </div>

    <audio id="background-music" loop>
        <source src="assets/musik.mp3" type="audio/mp3">
    </audio>

    <script>
        // Open Invitation Card
        document.getElementById('open-invitation').addEventListener('click', function() {
            document.getElementById('overlay').classList.add('fade-out');
            setTimeout(function() {
                document.getElementById('overlay').style.display = 'none';
                document.getElementById('background-music').play();
            }, 1000);
        });

        // Music Control
        const musicToggle = document.getElementById('music-toggle');
        const backgroundMusic = document.getElementById('background-music');
        
        musicToggle.addEventListener('click', function() {
            if (backgroundMusic.paused) {
                backgroundMusic.play();
                musicToggle.innerHTML = '<i class="fas fa-music"></i>';
            } else {
                backgroundMusic.pause();
                musicToggle.innerHTML = '<i class="fas fa-volume-mute"></i>';
            }
        });

        // Countdown Timer
        const weddingDate = new Date("2026-08-27T08:00:00").getTime();

        function updateCountdown() {
            const now = new Date().getTime();
            const distance = weddingDate - now;
            
            if (distance < 0) {
                document.getElementById('days').innerHTML = "00";
                document.getElementById('hours').innerHTML = "00";
                document.getElementById('minutes').innerHTML = "00";
                document.getElementById('seconds').innerHTML = "00";
                return;
            }
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            document.getElementById('days').innerHTML = days < 10 ? "0" + days : days;
            document.getElementById('hours').innerHTML = hours < 10 ? "0" + hours : hours;
            document.getElementById('minutes').innerHTML = minutes < 10 ? "0" + minutes : minutes;
            document.getElementById('seconds').innerHTML = seconds < 10 ? "0" + seconds : seconds;
        }

        setInterval(updateCountdown, 1000);
        updateCountdown();

        // Copy to Clipboard function
        const copyButtons = document.querySelectorAll('.copy-btn');
        copyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const text = this.getAttribute('data-clipboard-text');
                navigator.clipboard.writeText(text).then(() => {
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-check"></i> Tersalin';
                    setTimeout(() => {
                        this.innerHTML = originalText;
                    }, 2000);
                });
            });
        });

        // Form submission via AJAX
        document.getElementById('rsvpForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const formData = new FormData(form);
            
            fetch('rsvp.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Clear form
                    form.reset();
                    
                    // Add the new comment to the list
                    const ucapanItems = document.getElementById('ucapan-items');
                    const newUcapan = document.createElement('div');
                    newUcapan.classList.add('ucapan-item', 'new-comment');
                    
                    newUcapan.innerHTML = `
                        <div class="ucapan-avatar">${data.nama.substring(0, 1)}</div>
                        <div class="ucapan-content">
                            <div class="ucapan-header">
                                <h4>${data.nama}</h4>
                                <span class="ucapan-kehadiran ${data.kehadiran.toLowerCase().replace(' ', '-')}">${data.kehadiran}</span>
                            </div>
                            <p class="ucapan-text">${data.pesan}</p>
                            <p class="ucapan-time">Baru saja</p>
                        </div>
                    `;
                    
                    // Add to the top of the list
                    ucapanItems.insertBefore(newUcapan, ucapanItems.firstChild);
                    
                    // Remove "no comments yet" message if it exists
                    const noUcapan = document.querySelector('.no-ucapan');
                    if (noUcapan) {
                        noUcapan.remove();
                    }
                    
                    // Scroll to the new comment
                    newUcapan.scrollIntoView({ behavior: 'smooth' });
                    
                    // Show success message
                    alert('Terima kasih atas ucapan dan konfirmasi kehadiran Anda!');
                } else {
                    alert('Terjadi kesalahan: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi nanti.');
            });
        });
    </script>
</body>
</html>