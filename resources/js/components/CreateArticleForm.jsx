import React, { useEffect, useState } from "react";
import axios from 'axios';

export default function CreateArticleForm(){

    const [title, setTitle] =useState("");
    const [description, setDescription] = useState("");
    const [price, setPrice] = useState(0);
    const [categoryId, setCategoryId] = useState("");
    const [categories, setCategories] = useState([]);
    const [images, setImages] = useState([]);
    const [successMessage, setSuccessMessage] = useState("");
    const [submissionError, setSubmissionError] = useState(null); 

    const handleSubmit = (e) => {
        e.preventDefault();

        let formData = new FormData();

        formData.append("title", title);
        formData.append('description', description);
        formData.append("price", price);
        formData.append("category_id", categoryId);
        images.forEach((image) => {
            formData.append('images[]', image);
        });

        const selectedCategory = categories.find(cat => cat.id === parseInt(categoryId));

        
        // console.log("Titolo", title);
        // console.log("Descrizione:", description);
        // console.log("Prezzo:", price);
        // console.log("Categoria:", categoryId);
        // console.log("Categoria Nome:", selectedCategory ? selectedCategory.name : "Non selezionata");
        // console.log([...formData]);


        axios.post('/articles', formData)
            .then(res => {
                console.log('Articolo creato'); 
                setSuccessMessage('Articolo creato');
                
                // Reset degli stati
                setTitle("");
                setDescription("");
                setPrice(0);
                setCategoryId(""); 
                setImages([]);

                setTimeout(() => setSuccessMessage(""), 3000);
            })
            .catch(err => {
                // Cattura l'errore 401 o altri errori di validazione/server
                console.error('Errore POST Articolo:', err.response || err);
                setSubmissionError('Errore nella creazione: ' + (err.response?.status === 401 ? 'Non autorizzato o sessione scaduta.' : 'Verifica i dati.'));
            });
        
        
    }

    useEffect(() => {
        axios.defaults.withCredentials = true; // invia cookie di sessione
        axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');


        // Caricamento categorie
        axios.get('/api/categories').then(res => {
            setCategories(res.data);
        })
        .catch(err => {
            console.error(err);
            
        })
    }, []);

    const handleImageChange = (e) => {
        setImages((prevImages) => [
            ...prevImages, ...Array.from(e.target.files)
        ]);
    }

    const removeImage = (index) => {
        const newImages = images.filter((_,i) => i!== index);
        setImages(newImages);
    };

    return (
        <form onSubmit={handleSubmit}>
            {successMessage && <div className="alert alert-success">{successMessage}</div>}
            {submissionError && <div className="alert alert-danger">{submissionError}</div>}
            <div>
                <label>Titolo:</label>
                <input 
                    type="text" 
                    value={title} 
                    onChange={(e) => setTitle(e.target.value)}
                />
            </div>
            <div>
                <label>Descrizione:</label>
                <textarea 
                    value={description} 
                    onChange={(e) => setDescription(e.target.value)}
                ></textarea>
            </div>
            <div>
                <label>Prezzo:</label>
                <input 
                    type="number" 
                    value={price} 
                    onChange={(e) => setPrice(e.target.value)}
                />
            </div>
            <select value={categoryId} onChange={(e) => setCategoryId(e.target.value)}>
                <option value="" disabled>Seleziona una categoria</option>
                {categories.map((category) => (
                    <option key={category.id} value={category.id}>
                        {category.name}
                    </option>
                ))}
            </select>
            <div>
                <label>Immagini:</label>
                <input 
                    type="file" 
                    // value={title} 
                    multiple
                    onChange={handleImageChange}
                />
            </div>
            <div className="image-preview">
                {images.map((file,index) => (
                    <div key={index} style={{ position: "relative", display: "inline-block", margin: "10px"}} >
                        <img src={URL.createObjectURL(file)} alt={`preview${index}`} width={100} />
                        <button type="button" onClick={() => removeImage(index)} style={{
                                position: "absolute",
                                top: 0,
                                right: 0,
                                background: "red",
                                color: "white",
                                border: "none",
                                borderRadius: "50%",
                                width: "20px",
                                height: "20px",
                                cursor: "pointer",
                            }}>X</button>
                    </div>
                ))}
            </div>
            <button type="submit" style={{ marginTop: "20px" }}>Crea</button>
        </form>
    )
}