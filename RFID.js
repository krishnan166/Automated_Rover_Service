

var con = mysql.createConnection({
  host: "localhost",
  user: "id12851612_rover",
  password: "athulya@123",
  database: "id12851612_athulya"
});

con_key.connect(function(err) {
  if (err) throw err;
  con.query("SELECT RFID_NO FROM athulya1", function (err, result, fields) {
    if (err) throw err;
    console.log(result);
  });
});
