<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Pembayaran</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.5; margin: 0; padding: 0;">
    <table width="100%" cellspacing="0" cellpadding="20" style="background-color: #f8f8f8;">
        <tr>
            <td>
                <table width="600" align="center" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <tr>
                        <td style="background-color: #007bff; padding: 20px; color: white; text-align: center; border-radius: 8px 8px 0 0;">
                            <h2>Konfirmasi Pembayaran</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                            <h3>Halo, {{ $booking->user->name }}</h3>
                            <p>Terima kasih telah melakukan pemesanan kamar di Hotelin.</p>
                            <p>Silakan lakukan pembayaran dan unggah bukti pembayaran Anda melalui link di bawah ini:</p>
                            <p style="text-align: center;">
                                <a href="{{ $paymentLink }}" style="background-color: #7D0A0A; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                                    Unggah Bukti Pembayaran
                                </a>
                            </p>

                            <p>Detail Pemesanan:</p>
                            <ul>
                                <li>Kode Booking: <strong>{{ $booking->code_booking }}</strong></li>
                                <li>Check-in: {{ $booking->check_in_date }}</li>
                                <li>Check-out: {{ $booking->check_out_date }}</li>
                                <li>Total Harga: Rp {{ number_format($booking->total_price, 0, ',', '.') }}</li>
                            </ul>

                            <p>Jika Anda memiliki pertanyaan, silakan hubungi kami.</p>
                            <p>Salam, <br> Hotelin</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
