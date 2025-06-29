-- Create the database
CREATE DATABASE IF NOT EXISTS wedding_invitation;

-- Use the database
USE wedding_invitation;

-- Create the RSVP table
CREATE TABLE IF NOT EXISTS rsvp (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    kehadiran ENUM('Hadir', 'Tidak Hadir') NOT NULL,
    pesan TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert some sample data (optional)
INSERT INTO rsvp (nama, kehadiran, pesan) VALUES 
('Bambang Sutrisno', 'Hadir', 'Selamat atas pernikahan kalian! Semoga menjadi keluarga yang sakinah, mawaddah, warahmah.'),
('Dewi Kartika', 'Hadir', 'Semoga pernikahan kalian membawa keberkahan dan kebahagiaan. Aamiin.'),
('Ahmad Fadillah', 'Tidak Hadir', 'Maaf tidak bisa hadir, ada acara keluarga. Semoga lancar sampai hari H!'),
('Rina Anggraini', 'Hadir', 'Selamat menempuh hidup baru, semoga menjadi pasangan yang selalu bersama dalam suka dan duka.'),
('Joko Widodo', 'Hadir', 'Alhamdulillah, turut berbahagia atas pernikahan kalian. Semoga Allah memberkahi.'),
('Sinta Nurhaliza', 'Tidak Hadir', 'Mohon maaf tidak bisa hadir karena ada tugas di luar kota. Doakan semoga kami bisa segera menyusul ya.');

-- Create table for admin users (optional for future development)
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;