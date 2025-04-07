<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Kamar Baru - Hotelin</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.5; margin: 0; padding: 0;">
    <table width="100%" cellspacing="0" cellpadding="20" style="background-color: #f8f8f8;">
        <tr>
            <td>
                <table width="600" align="center" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <tr>
                        <td style="background-color: #7D0A0A; padding: 20px; color: white; text-align: center; border-radius: 8px 8px 0 0;">
                            <h2>Pemesanan Kamar Baru - Hotelin</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                            <h3>Halo Admin,</h3>
                            <p>Telah masuk satu pemesanan kamar baru dari pengguna <strong>{{ $booking->user->name }}</strong>.</p>
                            
                            <p>Berikut adalah detail pemesanan:</p>
                            <ul>
                                <li>Kode Pemesanan: <strong>{{ $booking->code_booking }}</strong></li>
                                <li>Nama Pemesan: {{ $booking->user->name }}</li>
                                <li>Check-in: {{ $booking->check_in_date }}</li>
                                <li>Check-out: {{ $booking->check_out_date }}</li>
                                <li>Total Harga: Rp {{ number_format($booking->total_price, 2, ',', '.') }}</li>
                            </ul>

                            <p>Silakan masuk ke dashboard admin untuk melihat dan menindaklanjuti pemesanan ini.</p>

                            <p style="text-align: center;">
                                <a href="{{ $urlLink }}" style="background-color: #28a745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                                    Lihat Pemesanan Kamar
                                </a>
                            </p>

                            <p>Terima kasih, <br> Sistem Hotelin</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
