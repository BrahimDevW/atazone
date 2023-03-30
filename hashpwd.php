<?php 

// var_dump(password_hash('Azerty&59.',PASSWORD_ARGON2I));

// var_dump(password_verify('Azerty&59.','$argon2i$v=19$m=65536,t=4,p=1$ZklWdm9XTTcyV1RUcVF4RQ$YQ6th0emBahfbK0vGMaTILRjE0eF2vhe3H5R+Njw55w'));


var_dump(password_hash('P@ssw0rd',PASSWORD_ARGON2I));