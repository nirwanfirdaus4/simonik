<label>Wisata Terdekat</label>
<select class="form-control" name="wisata" id="wisata">
    <?php
    if(count($siswa->result_array())>0)
    {
        echo "<option>- Pilih Wisata -</option>";
        foreach($siswa->result_array() as $k)
        {
        echo "<option value='".$k['id_proker']."'>".$k['nama_proker']."</option>";
        } 
    }
    else{
        echo "<option>- Data Belum Tersedia -</option>";
    }
    ?>
</select>