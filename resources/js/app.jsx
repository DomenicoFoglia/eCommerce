import React from "react";
import ReactDOM from "react-dom/client";
import ArticlesList from "./components/ArticlesList";
import ArticlesByCategory from "./components/ArticlesByCategory";
import CreateArticleForm from "./components/CreateArticleForm";



//Creazione articoli
const createArticleElement = document.getElementById("create-article-react");
if(createArticleElement){
    ReactDOM.createRoot(createArticleElement).render(
        <CreateArticleForm />
    );
}

//Lista tutti gli articoli
const articlesListElement = document.getElementById("articles-list");
if (articlesListElement) {
    const perPage = parseInt(articlesListElement.dataset.perPage) || 10;
    const showPagination = articlesListElement.dataset.showPagination !== "false";
    ReactDOM.createRoot(articlesListElement).render(
        <ArticlesList perPage={perPage} showPagination={showPagination} />
    );
}

//Lista articoli per categoria
const categoryElement = document.getElementById("articles-by-category");
if(categoryElement){
    const perPage = parseInt(categoryElement.dataset.perPage) || 10;
    const showPagination = categoryElement.dataset.showPagination !== 'false';
    const categoryId = categoryElement.getAttribute("data-category-id");
    ReactDOM.createRoot(categoryElement).render(
        <ArticlesByCategory categoryId={categoryId} perPage={perPage} showPagination={showPagination}  />
    );
}