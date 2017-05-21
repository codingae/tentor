/*daftar user*/
create view `view_user` AS select 
`user`.`id_user` AS `id_user`,
`user`.`level` AS `level`,
`user`.`uname` AS `uname`,
`user`.`pass` AS `pass`,
`user`.`last_login` AS `last_login`,
`user`.`status` AS `status`,
`user`.`kode_verifikasi` AS `kode_verifikasi`,
`user_detail`.`nama_lengkap` AS `nama_lengkap`,
`user_detail`.`no_telp` AS `no_telp`,
`user_detail`.`email` AS `email`,
`user_detail`.`alamat` AS `alamat`,
`user_detail`.`foto` AS `foto`,
`user_detail`.`longtitude` AS `longtitude`,
`user_detail`.`lattitude` AS `lattitude`
from (`user` join `user_detail` 
on((`user`.`id_user` = `user_detail`.`id_user`)));