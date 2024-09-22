import React, { useState, useEffect } from 'react';
import { BrowserRouter as Router, Routes, Route, useLocation } from 'react-router-dom';

const ImageViewer: React.FC = () => {
  const [images, setImages] = useState<string[]>([]);
  const location = useLocation();

  useEffect(() => {
    const storedImages = localStorage.getItem('images');
    if (storedImages) {
      setImages(JSON.parse(storedImages));
    }

    // Redirecionar após carregar a página
    const timeoutId = setTimeout(() => {
      window.location.href = 'http://192.168.0.102:8081/homePage'; 
    }, 3000); 

    return () => clearTimeout(timeoutId); 
  }, []);

  useEffect(() => {
    const queryParams = new URLSearchParams(location.search);
    const imageUrl = queryParams.get('image');

    if (imageUrl && !images.includes(imageUrl)) {
      const updatedImages = [...images, imageUrl];
      setImages(updatedImages);
      localStorage.setItem('images', JSON.stringify(updatedImages));
    }
  }, [location.search, images]);

  return (
    <div style={{ textAlign: 'center', marginTop: '20px' }}>
      <h1>Imagens do QR Code</h1>
      {images.length > 0 ? (
        images.map((image, index) => (
          <img 
            key={index} 
            src={image} 
            alt={`Imagem ${index + 1}`} 
            style={{ maxWidth: '80%', marginBottom: '20px' }} 
          />
        ))
      ) : (
        <p>Nenhuma imagem encontrada!</p>
      )}
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

export default App;
