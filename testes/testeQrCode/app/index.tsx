import { Text, View, StyleSheet } from "react-native";
import { Image } from 'expo-image';

export default function Index() {
  return (
    <View
      style={{
        flex: 1,
        justifyContent: "center",
        alignItems: "center",
      }}
    >
      <Image
        style={styles.image}
        source={require('../assets/images/adaptive-icon.png')}
        transition={1000}
      />
    </View>
  );
}

const styles = StyleSheet.create({
  image: {
    flex: 1,
    width: '50%',
    backgroundColor: '#0553',
  },
});