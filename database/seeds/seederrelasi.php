<?php
use Illuminate\Database\Seeder;
use App\mahasiswa;
use App\wali;
use App\dosen;
use App\hobi;
class seederrelasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Kosongin isi tabel
		DB::table('mahasiswa')->delete();
		DB::table('wali')->delete();

		/***********************************
		 *** SIAPKAN SEEDER DOSEN DISINI ***
		 ***********************************/
		DB::table('dosen')->delete();
		DB::table('hobi')->delete();
		DB::table('mahasiswa_hobi')->delete();
		//
		$dosen = Dosen::create(array(
			'nama' => 'Yulianto',
			'nipd' => '1234567890'));

		$this->command->info('Data dosen telah diisi!');
		/* Kita akan membuat 3 orang mahasiswa sebagai sampel
		 * Disinilah alasan kenapa saya membuat model terlebih dahulu
		 * Karena saya memanfaatkan model untuk mengcreate record
		*/

		# Mahasiswa Pertama bernama Noviyanto Rachmadi. Dengan NIM 1015015072.
		$novay = Mahasiswa::create(array(
			'nama' => 'Novianto Rachmadi',
			'nim'  => '1015015072',
			'id_dosen' => $dosen->id));
		# Mahasiswa Kedua bernama Djaffar. Dengan NIM 1015015088.
		$dije = Mahasiswa::create(array(
			'nama' => 'Djaffar',
			'nim'  => '1015015088',
			'id_dosen' => $dosen->id));
		# Mahasiswa Ketiga bernama Puji Rahayu. Dengan NIM 1015015078.
		$ayu = Mahasiswa::create(array(
			'nama' => 'Puji Rahayu',
			'nim'  => '1015015078',
			'id_dosen' => $dosen->id));
		# Informasi ketika mahasiswa telah diisi.
		$this->command->info('Mahasiswa telah diisi!');

		/*
		 * Disini kita akan menggunakan ketiga variabel yang kita
		 * deklarasikan diatas yaitu '$novay', '$dije', '$ayu'
		 * dengan cara mengambil id dari masing-masing variabel yang
		 * baru saja di isi.
		 */

		# Ciptakan wali si $novay
		Wali::create(array(
			'nama'  => 'Achmad S',
			'id_mahasiswa' => $novay->id
		));
		# Ciptakan wali si $dije
		Wali::create(array(
			'nama'  => 'Entahlah',
			'id_mahasiswa' => $dije->id
		));
		# Ciptakan wali si $ayu
		Wali::create(array(
			'nama'  => 'Arianto',
			'id_mahasiswa' => $ayu->id
		));

		# Informasi ketika semua wali telah diisi.
		$this->command->info('Data mahasiswa dan wali telah diisi!');

		/***********************************
		 *** SIAPKAN SEEDER HOBI DISINI  ***
		 ***********************************/

		//
		$mandi_hujan = hobi::create(array('hobi' => 'Mandi Hujan'));
		$baca_buku = hobi::create(array('hobi' => 'Baca Buku'));
		
		$novay->hobi()->attach($mandi_hujan->id);
		$novay->hobi()->attach($baca_buku->id);
		$dije->hobi()->attach($mandi_hujan->id);
		$ayu->hobi()->attach($baca_buku->id);

		$this->command->info('Mahasiswa beserta Hobi telah diisi!');
    }
}
?>