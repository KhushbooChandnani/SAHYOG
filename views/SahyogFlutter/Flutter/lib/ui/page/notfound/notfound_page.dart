import 'package:flutter/material.dart';
import 'package:geo_location_finder/geo_location_finder.dart';
import 'package:http/http.dart' as http;
import 'dart:convert';

class NotFoundPage extends StatelessWidget {


  Future _database() async {
    try{
      Map<dynamic, dynamic> locationMap = await GeoLocation.getLocation;
      var status = locationMap["status"];
      if ((status is String && status == "true") || (status is bool) && status) {
        var lat = locationMap["latitude"];
        var lng = locationMap["longitude"];
       final response = await http.post("http://192.168.7.151/Sahyog/views/SahyogFlutter/helper/demo/geocode.php", body: {
      "lat": lat,
      "lng": lng,
      "action": "geo_loc",
    });

    Map<String , dynamic> _data = jsonDecode(response.body);

    print(_data);


      }
    }catch( PlatformException ){
      print('Failed to get location');
    }

  }


  Widget bodyData() => Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Ink(
              decoration: ShapeDecoration(
                color : Colors.black,
                shape: CircleBorder(),
                

              ),
              child: IconButton(
              icon:Icon(Icons.all_inclusive,
              color: Colors.blueAccent,
              ),
              iconSize: 150.0,
              splashColor : Colors.redAccent,
              padding: EdgeInsets.all(40.0),
              onPressed: (){
                _database();
              },
              )
            ),

          Padding(padding: EdgeInsets.all(25.0),),

            Text("Send Emergency Alert.",
            style:  TextStyle(color: Colors.black , fontSize: 22.2 , fontWeight: FontWeight.bold),)
            
          ],
        ),
      );

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title : Text("Send Alert"),
      ),
      body: bodyData(),
    );
  }
}
