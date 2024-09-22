import AsyncStorage from '@react-native-async-storage/async-storage';
import { Image, StyleSheet, View } from 'react-native';
import React, { useEffect, useState } from 'react';

const MyComponent: React.FC = () => {
  const [imageUri, setImageUri] = useState<string | null>(null); 

  useEffect(() => {
    const fetchImage = async () => {
      try {
        const storedImage = await AsyncStorage.getItem('imageUri');
        if (storedImage !== null) {
          setImageUri(storedImage);
        }
      } catch (error) {
        console.error('Erro ao recuperar a imagem', error);
      }
    };

    fetchImage();
  }, []);

  return (
    <View style={styles.container}>
      {imageUri ? (
        <Image
          source={{ uri: imageUri }}
          style={styles.image}
        />
      ) : (
        <View style={styles.placeholder}>
        </View>
      )}
    </View>
  );
};

const styles = StyleSheet.create({
  container: {
    justifyContent: 'center',
    alignItems: 'center',
    flex: 1,
  },
  image: {
    width: 100,
    height: 100,
  },
  placeholder: {
    width: 100,
    height: 100,
    backgroundColor: '#ccc',
  },
});

export default MyComponent;
