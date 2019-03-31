import 'package:flutter/material.dart';
import 'package:flutter_uikit/utils/uidata.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:shared_preferences/shared_preferences.dart';

class LoginTwoPage extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return Inputs();
  }

}

class Inputs extends StatefulWidget{
  @override
  MyInputs createState() => MyInputs();

}
class MyInputs extends State<Inputs>{

  final username = TextEditingController();
  final password = TextEditingController();

  Future<bool> _database() async {
    final response = await http.post("http://192.168.7.151/Sahyog/views/SahyogFlutter/helper/login_routing.php", body: {
      "user_email": username.text,
      "user_password": password.text,
      "action": "login",
    });
  print(username.text);
    Map<String, dynamic> _data = jsonDecode(response.body);
  print(_data);
    if(_data['status'] == true){
        
        Future<SharedPreferences> prefs = SharedPreferences.getInstance();



        SharedPreferences _prefInstance = await prefs;

        _prefInstance.setString("user_id",_data['user_id']);
        _prefInstance.setString("user_email",_data['user_email']);
        _prefInstance.setString("user_first_name",_data['user_first_name']);
        _prefInstance.setString("user_last_name",_data['user_last_name']);
        // print(_prefInstance.getString());
         return true;  
    }else{
      return false;
    }
  }
  @override
  Widget build(BuildContext context) {
     return Scaffold(
      backgroundColor: Colors.white,
      body: Center(
        child: loginBody(),
      ),
    );

  }

  loginBody() {
        return SingleChildScrollView(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.spaceAround,
              children: <Widget>[loginHeader(), loginFields()],
        ),
      );
  }

  loginHeader() => Column(
        mainAxisAlignment: MainAxisAlignment.spaceBetween,
        children: <Widget>[
          FlutterLogo(
            colors: Colors.green,
            size: 80.0,
          ),
          SizedBox(
            height: 30.0,
          ),
          Text(
            "Welcome to ${UIData.appName}",
            style: TextStyle(fontWeight: FontWeight.w700, color: Colors.blueAccent),
          ),
          SizedBox(
            height: 5.0,
          ),
          Text(
            "Sign in to continue",
            style: TextStyle(color: Colors.grey),
          ),
        ],
      );

  loginFields() => Container(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.spaceAround,
          mainAxisSize: MainAxisSize.min,
          children: <Widget>[
            Container(
              padding: EdgeInsets.symmetric(vertical: 16.0, horizontal: 30.0),
              child: TextField(
                maxLines: 1,
                decoration: InputDecoration(
                  hintText: "Enter your username",
                  labelText: "Username",
                ),
                controller: username,
              ),
            ),
            Container(
              padding: EdgeInsets.symmetric(vertical: 0.0, horizontal: 30.0),
              child: TextField(
                maxLines: 1,
                obscureText: true,
                decoration: InputDecoration(
                  hintText: "Enter your password",
                  labelText: "Password",
                ),
                controller: password,
              ),
            ),
            SizedBox(
              height: 30.0,
            ),
            Container(
              padding: EdgeInsets.symmetric(vertical: 0.0, horizontal: 30.0),
              width: double.infinity,
              child: RaisedButton(
                padding: EdgeInsets.all(12.0),
                shape: StadiumBorder(),
                child: Text(
                  "LOG IN",
                  style: TextStyle(color: Colors.white),
                ),
                color: Colors.blueAccent,
                onPressed: (){
                  // print("abhi karunga shift");
                  var status = _database();
                  if(status == true){
                      
                  }
                },
              ),
            ),
            SizedBox(
              height: 5.0,
            ),
            Text(
              "SIGN UP FOR AN ACCOUNT",
              style: TextStyle(color: Colors.blueAccent),
            ),
          ],
        ),
      );
}
