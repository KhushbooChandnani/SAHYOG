import 'package:flutter/material.dart';
import 'package:flutter_uikit/utils/uidata.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';
import 'package:shared_preferences/shared_preferences.dart';

class AddContact extends StatelessWidget {
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

  final contactName = TextEditingController();
  final contactNumber = TextEditingController();

  Future<bool> _database() async {
    String contactname = contactName.text;
    var contactnumber = contactNumber.text;
    print(contactnumber.length);
    if(contactname.length == 0 || contactnumber.length != 10){
      return false;
    }

    SharedPreferences _prefs = await SharedPreferences.getInstance();

    var user_id = _prefs.getString('user_id');
    final response = await http.post("http://192.168.7.151/Sahyog/views/SahyogFlutter/helper/add_contact.php", body: {
      "user_contact_name":contactname,
      "user_contact_number":contactnumber,
      "user_id" : user_id,
      "action": "add_contact",
    });

    Map<String , dynamic> _data = jsonDecode(response.body);
    return _data['status'];


    
  }
  @override
  Widget build(BuildContext context) {
     return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        title: Text('Add Contacts'),
      ),
      body: Center(
        child: loginBody(),
      ),
    );

  }

  loginBody() {
        return SingleChildScrollView(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.spaceAround,
              children: <Widget>[ loginFields()],
        ),
      );
  }

  
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
                  hintText: "Enter your Contact Name",
                  labelText: "Contact Name",
                ),
                controller: contactName,
              ),
            ),
            Container(
              padding: EdgeInsets.symmetric(vertical: 0.0, horizontal: 30.0),
              child: TextField(
                maxLines: 1,
                decoration: InputDecoration(
                  hintText: "Enter your Contact Number",
                  labelText: "Contact Number",
                ),
                controller: contactNumber,
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
                  "Add Contact",
                  style: TextStyle(color: Colors.white),
                ),
                color: Colors.blueAccent,
                onPressed: (){
                  _database();
                  
                },
              ),
            ),
          ],
        ),
      );
}
