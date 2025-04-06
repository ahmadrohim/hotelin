<!DOCTYPE html>
<html>
<head>
    <title>Status Pemesanan</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.5; margin: 0; padding: 0;">
    <table width="100%" cellspacing="0" cellpadding="20" style="background-color: #f8f8f8;">
        <tr>
            <td>
                <table width="600" align="center" style="background-color: #ffffff; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <tr>
                        <td style="background-color: #7D0A0A; padding: 20px; color: white; text-align: center; border-radius: 8px 8px 0 0;">
                            <h2>Status Pemesanan Diperbarui</h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px;">
                            <h3>Halo, {{ $booking->user->name }}</h3>
                            <p>Status pemesanan Anda telah diperbarui:</p>

                            <p>Detail Pemesanan:</p>
                            <ul>
                                <li><strong>Kode Booking:</strong> {{ $booking->code_booking }}</li>
                                <li><strong>Status Pemesanan:</strong> {{ ucfirst($booking->status) }}</li>
                                <li><strong>Status Pembayaran:</strong> {{ ucfirst($booking->payment_status) }}</li>
                            </ul>
                        
                            <p>Silakan login ke akun Anda untuk melihat detail lengkapnya.</p>
                        
                            <p>Terima kasih telah memilih Hotelin!</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
