<form method="POST" action="/keluhan">
    @csrf
    Nama :<input type="text" name="name" /><br />
    Isi Keluhan :<textarea name="keluhan"></textarea><br />
    <input type="submit" name="Submit">

</form>