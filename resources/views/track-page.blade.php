<!DOCTYPE html>
<html lang="id">

<div style="background: #111; color: white; padding: 50px; text-align: center; font-family: sans-serif;">
    <h2 style="color: #D4AF37;">TRACK YOUR SESSION</h2>
    <p>Masukkan kode booking Anda (Contoh: PSIM-12345)</p>

    <form action="{{ route('booking.track') }}" method="POST" style="max-width: 400px; margin: 0 auto;">
        @csrf
        <input type="text" name="code" placeholder="PSIM-XXXXX" required
            style="width: 100%; padding: 15px; background: #222; border: 1px solid #D4AF37; color: white; margin-bottom: 20px; text-align: center; text-transform: uppercase;">
        <button type="submit"
            style="background: #D4AF37; color: black; border: none; padding: 15px 30px; font-weight: bold; cursor: pointer; width: 100%;">
            LACAK PROGRES
        </button>
    </form>
</div>
