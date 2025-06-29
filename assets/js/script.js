/**
 * Wedding Invitation Interactive Elements
 * This script controls the music player, animations, countdown timer,
 * copy functionality, and other interactive elements on the invitation
 */

document.addEventListener('DOMContentLoaded', function() {
    // ===== Music Player Controls =====
    const musicToggle = document.getElementById('music-toggle');
    const backgroundMusic = document.getElementById('background-music');
    
    // Initialize music player
    function initMusicPlayer() {
        // Set initial state (music paused)
        backgroundMusic.volume = 0.5;
        
        musicToggle.addEventListener('click', function() {
            if (backgroundMusic.paused) {
                backgroundMusic.play()
                    .then(() => {
                        musicToggle.innerHTML = '<i class="fas fa-music"></i>';
                    })
                    .catch(error => {
                        console.error('Music play failed:', error);
                        musicToggle.innerHTML = '<i class="fas fa-volume-mute"></i>';
                    });
            } else {
                backgroundMusic.pause();
                musicToggle.innerHTML = '<i class="fas fa-volume-mute"></i>';
            }
        });
    }

    // ===== Opening Animation =====
    const openInvitation = document.getElementById('open-invitation');
    const overlay = document.getElementById('overlay');
    
    if (openInvitation && overlay) {
        openInvitation.addEventListener('click', function() {
            overlay.classList.add('fade-out');
            setTimeout(function() {
                overlay.style.display = 'none';
                // Auto-play music when invitation opens (if browser allows)
                backgroundMusic.play()
                    .catch(error => {
                        console.log('Auto-play prevented by browser, music button is available');
                    });
            }, 1000);
        });
    }

    // ===== Countdown Timer =====
    // Set the wedding date - Format: Year, Month (0-11), Day, Hour, Minute
    // Note: Month is 0-indexed (0 = January, 11 = December)
    const weddingDate = new Date("2023-08-27T08:00:00").getTime();

    function updateCountdown() {
        const now = new Date().getTime();
        const distance = weddingDate - now;
        
        // If the date has passed
        if (distance < 0) {
            document.getElementById('days').innerHTML = "00";
            document.getElementById('hours').innerHTML = "00";
            document.getElementById('minutes').innerHTML = "00";
            document.getElementById('seconds').innerHTML = "00";
            return;
        }
        
        // Calculate time units
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        // Add leading zero if needed
        document.getElementById('days').innerHTML = days < 10 ? "0" + days : days;
        document.getElementById('hours').innerHTML = hours < 10 ? "0" + hours : hours;
        document.getElementById('minutes').innerHTML = minutes < 10 ? "0" + minutes : minutes;
        document.getElementById('seconds').innerHTML = seconds < 10 ? "0" + seconds : seconds;
    }

    // Initialize countdown
    if (document.getElementById('days')) {
        setInterval(updateCountdown, 1000);
        updateCountdown();
    }

    // ===== Copy to Clipboard for Amplop Digital =====
    const copyButtons = document.querySelectorAll('.copy-btn');
    
    if (copyButtons.length > 0) {
        copyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const text = this.getAttribute('data-clipboard-text');
                
                navigator.clipboard.writeText(text)
                    .then(() => {
                        const originalText = this.innerHTML;
                        this.innerHTML = '<i class="fas fa-check"></i> Tersalin';
                        
                        setTimeout(() => {
                            this.innerHTML = originalText;
                        }, 2000);
                    })
                    .catch(err => {
                        console.error('Failed to copy text: ', err);
                        alert('Gagal menyalin teks. Silakan coba lagi.');
                    });
            });
        });
    }

    // ===== Smooth Scroll for Navigation =====
    const navLinks = document.querySelectorAll('.navigation a');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 70, // Offset for fixed navbar
                    behavior: 'smooth'
                });
            }
        });
    });

    // ===== Form submission via AJAX =====
    const rsvpForm = document.getElementById('rsvpForm');
    
    if (rsvpForm) {
        rsvpForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const formData = new FormData(form);
            
            // Show loading state
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
            submitBtn.disabled = true;
            
            fetch('rsvp.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Reset button state
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
                
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
                    if (ucapanItems.firstChild) {
                        ucapanItems.insertBefore(newUcapan, ucapanItems.firstChild);
                    } else {
                        ucapanItems.appendChild(newUcapan);
                    }
                    
                    // Remove "no comments yet" message if it exists
                    const noUcapan = document.querySelector('.no-ucapan');
                    if (noUcapan) {
                        noUcapan.remove();
                    }
                    
                    // Scroll to the new comment
                    newUcapan.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    
                    // Show success message
                    alert('Terima kasih atas ucapan dan konfirmasi kehadiran Anda!');
                } else {
                    alert('Terjadi kesalahan: ' + data.message);
                }
            })
            .catch(error => {
                // Reset button state
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
                
                console.error('Error:', error);
                alert('Terjadi kesalahan. Silakan coba lagi nanti.');
            });
        });
    }

    // ===== Lightbox Gallery =====
    const galleryItems = document.querySelectorAll('.galeri-item');
    
    if (galleryItems.length > 0) {
        galleryItems.forEach(item => {
            item.addEventListener('click', function() {
                const imgSrc = getComputedStyle(this).backgroundImage.slice(4, -1).replace(/"/g, "");
                
                // Create lightbox elements
                const lightbox = document.createElement('div');
                lightbox.className = 'lightbox';
                lightbox.innerHTML = `
                    <div class="lightbox-content">
                        <span class="close-lightbox">&times;</span>
                        <img src="${imgSrc}" alt="Gallery Image">
                    </div>
                `;
                
                // Add to body
                document.body.appendChild(lightbox);
                document.body.style.overflow = 'hidden';
                
                // Close lightbox on click
                lightbox.querySelector('.close-lightbox').addEventListener('click', function() {
                    document.body.removeChild(lightbox);
                    document.body.style.overflow = '';
                });
                
                lightbox.addEventListener('click', function(e) {
                    if (e.target === lightbox) {
                        document.body.removeChild(lightbox);
                        document.body.style.overflow = '';
                    }
                });
            });
        });
        
        // Add lightbox styles
        const style = document.createElement('style');
        style.textContent = `
            .lightbox {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.8);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 1000;
            }
            .lightbox-content {
                position: relative;
                max-width: 90%;
                max-height: 90%;
            }
            .lightbox img {
                max-width: 100%;
                max-height: 90vh;
                display: block;
                border: 5px solid white;
                box-shadow: 0 0 20px rgba(0,0,0,0.5);
            }
            .close-lightbox {
                position: absolute;
                top: -30px;
                right: -30px;
                font-size: 30px;
                color: white;
                cursor: pointer;
            }
        `;
        document.head.appendChild(style);
    }

    // Initialize music player
    if (musicToggle && backgroundMusic) {
        initMusicPlayer();
    }

    // ===== URL Parameter Handling =====
    // Function to get URL parameters
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        const regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        const results = regex.exec(location.search);
        return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }
    
    // Check if we have a guest name parameter
    const guestName = getUrlParameter('to');
    if (guestName && document.getElementById('nama-tamu')) {
        document.getElementById('nama-tamu').textContent = guestName;
    }
});