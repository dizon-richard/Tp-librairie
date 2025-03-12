// const apiKey = "AIzaSyBAO5lh_7RG1J4fYVtJsuBl-0UamF7NdUg";

// function searchBooks() {
//   const query = document.getElementById("searchInput").value;
//   if (!query) return;

//   fetch(`https://www.googleapis.com/books/v1/volumes?q=${query}&key=${apiKey}`)
//     .then((response) => response.json())
//     .then((data) => {
//       const resultsDiv = document.getElementById("results");
//       resultsDiv.innerHTML = "";
//       data.items.forEach((book) => {
//         const title = book.volumeInfo.title;
//         const author = book.volumeInfo.authors?.join(", ") || "Auteur inconnu";
//         const thumbnail = book.volumeInfo.imageLinks?.thumbnail || "";

//         const bookDiv = document.createElement("div");

//         bookDiv.style.display = "flex";
//         bookDiv.style.flexDirection = "column";
//         bookDiv.style.alignItems = "center";
//         bookDiv.style.margin = "20px";
//         bookDiv.style.padding = "20px";
//         bookDiv.style.width = "200px";
//         bookDiv.style.border = "1px solid #ccc";
//         bookDiv.style.borderRadius = "5px";

//         bookDiv.innerHTML = `
//                     <h3>${title}</h3>
//                     <p>${author}</p>
//                     <img src="${thumbnail}" alt="${title}">
//                     <button onclick="addFavorite('${book.id}', '${title}', '${author}', '${thumbnail}')">Ajouter aux favoris</button>
//                 `;
//         resultsDiv.appendChild(bookDiv);
//       });
//     });

//   function addToFavorites(book_id, title, authors, thumbnail) {
//     fetch("/add-favorite", {
//       method: "POST",
//       headers: {
//         "Content-Type": "application/json",
//       },
//       body: JSON.stringify({ book_id, title, authors, thumbnail }),
//     })
//       .then((response) => response.text())
//       .then((data) => {
//         alert(data); // Afficher le message du serveur
//       })
//       .catch((error) => console.error("Erreur:", error));
//   }
// }

const API_URL = "https://www.googleapis.com/books/v1/volumes?q=";

function searchBooks() {
  const query = document.getElementById("searchInput").value;
  if (!query) return;

  fetch(API_URL + encodeURIComponent(query))
    .then((response) => response.json())
    .then((data) => {
      displayResults(data.items);
    })
    .catch((error) =>
      console.error("Erreur lors de la récupération des livres :", error)
    );
}

function displayResults(books) {
  const resultsDiv = document.getElementById("results");
  resultsDiv.innerHTML = "";

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
