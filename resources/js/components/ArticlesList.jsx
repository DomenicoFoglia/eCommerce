import React, { useEffect, useState } from "react";
import axios from "axios";

export default function ArticlesList({ perPage = 10, showPagination = true }) {
    const [articles, setArticles] = useState([]);
    const [currentPage, setCurrentPage] = useState(1);
    const [lastPage, setLastPage] = useState(1);

    useEffect(() => {
        axios
            .get(`/api/articles?perPage=${perPage}&page=${currentPage}`)
            .then(res => {
                setArticles(res.data.data);
                setCurrentPage(res.data.current_page);
                setLastPage(res.data.last_page);
            })
            .catch(err => console.error(err));
    }, [perPage, currentPage]);

    const goToPage = (page) => {
        if (page >= 1 && page <= lastPage) {
            setCurrentPage(page);
        }
    };

    return (
        <>
            <div className="row justify-content-center align-items-center py-5">
                {articles.length > 0 ? (
                    articles.map(article => (
                        <div key={article.id} className="col-12 col-md-3">
                            <div className="card mx-auto card-w shadow text-center mb-3">
                                <img
                                    src={article.image || "https://picsum.photos/200"}
                                    className="card-img-top"
                                    alt={`Immagine dell'articolo ${article.title}`}
                                    style={{ objectFit: "cover", height: "200px" }}
                                />
                                <div className="card-body">
                                    <h4 className="card-title">{article.title}</h4>
                                    <h6 className="card-subtitle text-body-secondary">
                                        {article.price ? `${article.price} $` : "Prezzo non disponibile"}
                                    </h6>
                                    <div className="d-flex justify-content-evenly align-items-center mt-5">
                                        <a href={`/show/article/${article.id}`} className="btn btn-primary">
                                            Dettaglio
                                        </a>
                                        <a href={`/category/${article.category?.id}`} className="btn btn-outline-info">
                                            Categoria
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ))
                ) : (
                    <div className="col-12">
                        <h3 className="text-center">Non sono stati creati ancora articoli</h3>
                    </div>
                )}
            </div>

            {/* Pagination */}
            {showPagination && lastPage > 1 && (
                <div className="d-flex justify-content-center my-4">
                    <button
                        className="btn btn-outline-primary me-2"
                        onClick={() => goToPage(currentPage - 1)}
                        disabled={currentPage === 1}
                    >
                        « Precedente
                    </button>
                    <span className="align-self-center mx-2">
                        Pagina {currentPage} di {lastPage}
                    </span>
                    <button
                        className="btn btn-outline-primary ms-2"
                        onClick={() => goToPage(currentPage + 1)}
                        disabled={currentPage === lastPage}
                    >
                        Successiva »
                    </button>
                </div>
            )}
        </>
    );
}
