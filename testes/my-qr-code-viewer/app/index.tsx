import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router, Routes, Route, useLocation } from 'react-router-dom';
import AS_images from '@react-native-async-storage/async-storage';

const ImageViewer: React.FC = () => {
  const [images, setImages] = useState<string | null>(null);
  const location = useLocation();

  const armazenar = async (chave: string, valor: string) => {
    try {
      await AS_images.setItem(chave, valor);
    } catch (error) {
      console.error('Erro ao armazenar no AsyncStorage', error);
    }
  };

  const buscar = async (chave: string) => {
    try {
      const valor = await AS_images.getItem(chave);
      setImages(valor); 
    } catch (error) {
      console.error('Erro ao buscar do AsyncStorage', error);
    }
  };

  useEffect(() => {
    // Pega a URL completa da requisição e pega o conteúdo de ?image=
    let queryParams = new URLSearchParams(location.search);
    let imageUrl: string = queryParams.get('image') || "";
  
    const textAuto: string = "image";
    let numberAuto: number = 0;
  
    const checarImagemIgual = async () => {
      let isStored = false;
  
      for (let i: number = 1; i <= 6; i++) {
        const varAuto = textAuto + i;
        const existeVariavel = await AS_images.getItem(varAuto);
  
        // Verifica se existeVariavel não é nulo e é igual à imageUrl
        if (existeVariavel !== null && existeVariavel === imageUrl) {
          isStored = true;
          break;
        }
      }
  
      if (!isStored) {
        for (let i: number = 1; i <= 6; i++) {
          const varAuto = textAuto + i;
          const existeVariavel = await AS_images.getItem(varAuto);
  
          if (existeVariavel === null) {
            armazenar(varAuto, imageUrl);
            break;
          }
        }
      }
    };
  
    checarImagemIgual();
  }, [location]);

  // useEffect(() => {
  //   // Pega a URL completa da requisição e pega o conteudo de ?image=
  //   let queryParams = new URLSearchParams(location.search);
  //   let imageUrl: string = queryParams.get('image') || "";
  
  //   const textAuto: string = "image";
  //   let numberAuto: number = 0;
  
  //   const checarImagemIgual = async () => {
  //     let isStored = false;
  
  //     for (let i: number = 1; i <= 6; i++) {
  //       const varAuto = textAuto + i;
  //       const existeVariavel = await AS_images.getItem(varAuto);
  //       console.log(existeVariavel)
  
  //       if (existeVariavel == imageUrl) {
  //         isStored = true;
  //         break;
  //       }
  //     }
  
  //     if (!isStored) {
  //       numberAuto++;
  //       const newKey = textAuto + numberAuto;
  //       armazenar(newKey, imageUrl);
  //       console.log(newKey)
  //     }
  //   };
  
  //   checarImagemIgual();
  // }, [location]);

  // useEffect(() => {
  //   // Redirecionar após carregar a página
  //   const timeoutId = setTimeout(() => {
  //     window.location.href = 'http://192.168.0.59:8081/homePage'; 
  //   }, 3000); 

  //   return () => clearTimeout(timeoutId); 
  // }, []);
  buscar("image1");
  return ( 
    
    <div style={{ textAlign: 'center', marginTop: '20px' }}>
      <h1>Imagens do QR Code</h1>
          <img 
            src={images || ''} 
            style={{ maxWidth: '30%', marginBottom: '20px' }} 
          />
    </div>
  );
};

const App: React.FC = () => {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<ImageViewer />} />
      </Routes>
    </Router>
  );
};

// let teste : string = "imagem";
// let numberTeste : number = 1;
// let juncao : any = teste + numberTeste;
// juncao = juncao.toString();
// console.log(typeof(juncao));
export default App;
