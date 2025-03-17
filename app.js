const API_URL = "https://www.googleapis.com/books/v1/volumes?q=";

function searchBooks() {
  const query = document.getElementById("searchInput").value;
  if (!query) return;

  //fetch de l'API
  fetch(API_URL + encodeURIComponent(query))
    .then((response) => response.json())
    .then((data) => {
      displayResults(data.items);
    })
    .catch((error) =>
      console.error("Erreur lors de la récupération des livres :", error)
    );
}

//Obtenir les résultats de la recherche
function displayResults(books) {
  const resultsDiv = document.getElementById("results");
  resultsDiv.innerHTML = "";

  //Boucle pour afficher les résultats
  books.forEach((book) => {
    const title = book.volumeInfo.title || "Titre inconnu";
    const authors = book.volumeInfo.authors
      ? book.volumeInfo.authors.join(", ")
      : "Auteur inconnu";
    const thumbnail = book.volumeInfo.imageLinks
      ? book.volumeInfo.imageLinks.thumbnail
      : "default-thumbnail.jpg";
    const bookId = book.id;

    const bookElement = document.createElement("div");
    bookElement.classList.add("book");
    bookElement.innerHTML = `
            <img src="${thumbnail}" alt="${title}">
            <h4>${title}</h4>
            <p>${authors}</p>
            <button onclick="addToFavorites('${bookId}', '${title}', '${authors}', '${thumbnail}')">
                Ajouter aux favoris
            </button>
        `;

    // Ajout des éléments dans le DOM
    resultsDiv.appendChild(bookElement);
  });
}

function addToFavorites(bookId, title, authors, thumbnail) {
  let favorites = JSON.parse(localStorage.getItem("favorites")) || [];

  if (!favorites.some((book) => book.id === bookId)) {
    favorites.push({ id: bookId, title, authors, thumbnail });
    localStorage.setItem("favorites", JSON.stringify(favorites));
  }

  displayFavorites();
}

function displayFavorites() {
  const favoritesContainer = document.getElementById("favorites-container");
  favoritesContainer.innerHTML = "";

  let favorites = JSON.parse(localStorage.getItem("favorites")) || [];

  favorites.forEach((book) => {
    const bookElement = document.createElement("div");
    bookElement.classList.add("book");
    bookElement.innerHTML = `
            <img src="${book.thumbnail}" alt="${book.title}">
            <h4>${book.title}</h4>
            <p>${book.authors}</p>
            <button onclick="removeFromFavorites('${book.id}')">Retirer des favoris</button>
        `;
    favoritesContainer.appendChild(bookElement);
  });
}

function removeFromFavorites(bookId) {
  let favorites = JSON.parse(localStorage.getItem("favorites")) || [];
  favorites = favorites.filter((book) => book.id !== bookId);
  localStorage.setItem("favorites", JSON.stringify(favorites));

  displayFavorites();
}
