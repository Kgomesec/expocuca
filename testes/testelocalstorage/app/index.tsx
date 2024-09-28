import { Text, View, Image } from "react-native";
import React, {useState} from 'react';
import AsyncStorage from '@react-native-async-storage/async-storage';
import AS_linguagens from '@react-native-async-storage/async-storage'; //podemos adicionar varios localstorages para organização

export default function Index() {

  const [teste, setTeste] = useState<string | null>(null);

  const armazenar = async (chave: string, valor: string) => {
    try {
      await AsyncStorage.setItem(chave, valor);
    } catch (error) {
      console.error('Erro ao armazenar no AsyncStorage', error);
    }
  };

  const buscar = async (chave: string) => {
    try {
      const valor = await AsyncStorage.getItem(chave);
      setTeste(valor); 
    } catch (error) {
      console.error('Erro ao buscar do AsyncStorage', error);
    }
  };

  armazenar('receba', 'hello, world!');
  armazenar('02', 'teste de');
  armazenar('03', 'localstorage em');
  armazenar('04', 'React');
  armazenar('05', 'Native');

  buscar('receba');

  return (
    <View
      style={{
        flex: 1,
        justifyContent: "center",
        alignItems: "center",
      }}
    >
      <Text>Armazenamento local / Async-Storage</Text>

      <Text>Teste localstorage: {teste}</Text>
    </View>
  );
}
