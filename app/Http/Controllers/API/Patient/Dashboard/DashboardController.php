<?php

namespace App\Http\Controllers\API\Patient\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataJadwalObat;

class DashboardController extends Controller
{
    public function jadwalObat($id_pasien){
        
       // query pick nama obat where waktu as key
        $data = DataJadwalObat::where('data_id_pasien', $id_pasien)->get(['nama_obat', 'waktu']);
        $data = $data->groupBy('waktu');
        $data = $data->map(function($item, $key){
            $item = $item->map(function($item, $key){
                // $item['waktu'] = $item['waktu' . $item['waktu']];
                return $item;
            });
            return $item;
        });

        //query pick nama obat and dosis; jika sama nama obat, dijadikan satu 
        $data2 = DataJadwalObat::where('data_id_pasien', $id_pasien)->groupBy('nama_obat')->groupBy('dosis_harian')->get(['nama_obat', 'dosis_harian']);
       

        return response()->json([
            'status' => 'Success',
            'message' => 'Data berhasil diambil',
            'data_waktu' => $data,
            'data_obat' => $data2,
            'status_code' => 200
        ], 200);
    }
}


//     public function sendNotificationThroughFCM(){

//         $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
            
//         $SERVER_API_KEY = env('FCM_SERVER_KEY');
    
//         $data = [
//             "registration_ids" => $firebaseToken,
//             "notification" => [
//                 "title" => $request->title,
//                 "body" => $request->body,  
//             ]
//         ];
//         $dataString = json_encode($data);
      
//         $headers = [
//             'Authorization: key=' . $SERVER_API_KEY,
//             'Content-Type: application/json',
//         ];
      
//         $ch = curl_init();
        
//         curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                 
//         $response = curl_exec($ch);

//         dd($response);
//     }
// }



// // <script type="module">
// //   // Import the functions you need from the SDKs you need
// //   import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-app.js";
// //   import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-analytics.js";
// //   // TODO: Add SDKs for Firebase products that you want to use
// //   // https://firebase.google.com/docs/web/setup#available-libraries

// //   // Your web app's Firebase configuration
// //   // For Firebase JS SDK v7.20.0 and later, measurementId is optional
// //   const firebaseConfig = {
// //     apiKey: "AIzaSyBTTVvTjrUqAZR5tmAzlajnuk6vYBdDvok",
// //     authDomain: "makobat-b43b4.firebaseapp.com",
// //     projectId: "makobat-b43b4",
// //     storageBucket: "makobat-b43b4.appspot.com",
// //     messagingSenderId: "858239910144",
// //     appId: "1:858239910144:web:4d7eb1803c4d9d5dd5b3e5",
// //     measurementId: "G-VCGKPHNVXY"
// //   };

// //   // Initialize Firebase
// //   const app = initializeApp(firebaseConfig);
// //   const analytics = getAnalytics(app);
// // </script>
