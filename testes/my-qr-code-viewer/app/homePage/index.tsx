import React, { useEffect, useState } from 'react';
import AS_images from '@react-native-async-storage/async-storage';

const DisplayImages: React.FC = () => {
  const [images, setImages] = useState<string[]>([]);

  useEffect(() => {
    const fetchImages = async () => {
      const imageList: string[] = [];

      for (let i = 1; i <= 6; i++) {
        const image = await AS_images.getItem(`image${i}`);
        if (image !== null) {
          imageList.push(image);
        }
      }

      setImages(imageList);
    };

    fetchImages();
  }, []);

  return (
    <div style={{ textAlign: 'center', marginTop: '20px' }}>
      <h1>Todas as Imagens Armazenadas</h1>
      {images.length > 0 ? (
        images.map((src, index) => (
          <img 
            key={index} 
            src={src} 
            alt={`Imagem ${index + 1}`} 
            style={{ maxWidth: '30%', margin: '10px' }} 
          />
        ))
      ) : (
        <p>Nenhuma imagem armazenada.</p>
      )}
    </div>
  );
};

export default DisplayImages;