const apiKey = "AIzaSyBAO5lh_7RG1J4fYVtJsuBl-0UamF7NdUg";

function searchBooks() {
  const query = document.getElementById("searchInput").value;
  if (!query) return;

  fetch(`https://www.googleapis.com/books/v1/volumes?q=${query}&key=${apiKey}`)
    .then((response) => response.json())
    .then((data) => {
      const resultsDiv = document.getElementById("results");
      resultsDiv.innerHTML = "";
      data.items.forEach((book) => {
        const title = book.volumeInfo.title;
        const author = book.volumeInfo.authors?.join(", ") || "Auteur inconnu";
        const thumbnail = book.volumeInfo.imageLinks?.thumbnail || "";

        const bookDiv = document.createElement("div");

        bookDiv.style.display = "flex";
        bookDiv.style.flexDirection = "column";
        bookDiv.style.alignItems = "center";
        bookDiv.style.margin = "20px";
        bookDiv.style.padding = "20px";
        bookDiv.style.width = "200px";
        bookDiv.style.border = "1px solid #ccc";
        bookDiv.style.borderRadius = "5px";

        bookDiv.innerHTML = `
                    <h3>${title}</h3>
                    <p>${author}</p>
                    <img src="${thumbnail}" alt="${title}">
                    <button onclick="addFavorite('${book.id}', '${title}', '${author}', '${thumbnail}')">Ajouter aux favoris</button>
                `;
        resultsDiv.appendChild(bookDiv);
      });
    });

  function addToFavorites(book_id, title, authors, thumbnail) {
    fetch("/add-favorite", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ book_id, title, authors, thumbnail }),
    })
      .then((response) => response.text())
      .then((data) => {
        alert(data); // Afficher le message du serveur
      })
      .catch((error) => console.error("Erreur:", error));
  }
}
