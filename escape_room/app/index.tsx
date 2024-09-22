import React from "react";
import { NativeBaseProvider, Text, Box } from "native-base";
// import { initializeApp } from "firebase/app";
// import { getAnalytics } from "firebase/analytics";
// import { FIREBASE_API_KEY } from '@env';

// const firebaseConfig = {
//   apiKey: FIREBASE_API_KEY,
//   authDomain: "escaperoom-b25e6.firebaseapp.com",
//   projectId: "escaperoom-b25e6",
//   storageBucket: "escaperoom-b25e6.appspot.com",
//   messagingSenderId: "183680342675",
//   appId: "1:183680342675:web:391ea2a9151aca8dbe8b66",
//   measurementId: "G-LW2KS5J1BB"
// };

// const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);

export default function App() {
  return (
    <NativeBaseProvider>
      <Box flex={1} bg="#fff" alignItems="center" justifyContent="center">
        <Text>Open up App.js to start working on your app!</Text>
      </Box>
    </NativeBaseProvider>
  );
}