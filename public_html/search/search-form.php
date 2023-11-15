<!-- Search form -->
<!-- Filter by: genre -->

<form id="searchForm">
    <div class="row">
        <div class="col-lg-3">
             <!-- Genre dropdown -->
            <select class="form-control" id="genre">
                <option value="" selected>Browse By Genre **CURRENTLY NONFUNCTIONAL**</option>
                <option value="all">All</option>
                <option value="action">Action</option>
                <option value="adventure">Adventure</option>
                <option value="children">Children</option>
                <option value="cooking">Cooking</option>
                <option value="comedy">Comedy</option>
                <option value="crime">Crime</option>
                <option value="drama">Drama</option>
                <option value="fantasy">Fantasy</option>
                <option value="fiction">Fiction</option>
                <option value="historical">Historical</option>
                <option value="horror">Horror</option>
                <option value="mystery">Mystery</option>
                <option value="romance">Romance</option>
                <option value="sci-fi">Sci-Fi</option>
                <option value="western">Western</option>
                <option value="ya">Young Adult</option>
            </select>
        </div>
        <div class="col-lg-8">
            <!-- Search bar -->
            <input type="text" class="form-control" id="search" placeholder="Search">
        </div>
        <div class="col-lg-1">
            <!-- Submit button -->
            <button type="submit" class="btn btn-light" style="width:100%;">
                <i class="fa-solid fa-search"></i>
            </button>
        </div>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.getElementById('searchForm');
    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const genre = document.getElementById('genre').value;
        const searchText = document.getElementById('search').value;

        // AJAX request to server
        fetch('/search/search-books.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `genre=${genre}&searchText=${searchText}`
        })
        .then(response => response.json())
        .then(data => {
            // Process and display the search results
            console.log(data); // For debugging
            // Add hidden attribute to book-container
            const bookContainer = document.getElementById('book-container');
            const mainContainer = document.getElementById('main-container');
            // bookContainer.setAttribute('hidden', '');
            // Remove all books from book-container
            while (bookContainer.firstChild) {
                bookContainer.removeChild(bookContainer.firstChild);
            }

            if (data.length === 0) {
                // Display no results found
                const noResults = document.createElement('h2');
                noResults.innerText = 'No results found. \n';
                const requestRedirect = document.createElement('a');
                requestRedirect.innerText = 'Would you like to request a book instead?';
                requestRedirect.setAttribute('href', '/request/request.php');
                noResults.appendChild(requestRedirect);
                mainContainer.appendChild(noResults);
                return;
            }
            // Add new books to book-container
            data.forEach(book => {
                const bookDiv = document.createElement('div');
                bookDiv.classList.add('book');
                const bookLink = document.createElement('a');
                bookLink.setAttribute('href', `book/book.php?isbn=${book.isbn}`);
                const bookImg = document.createElement('img');
                bookImg.classList.add('book-img');
                bookImg.setAttribute('src', `https://covers.openlibrary.org/b/isbn/${book.isbn}-L.jpg`);
                bookImg.setAttribute('alt', book.title);
                bookLink.appendChild(bookImg);
                bookDiv.appendChild(bookLink);
                bookTitle = document.createElement('p');
                bookTitle.classList.add('book-title');
                bookTitle.innerText = book.title;
                bookDiv.appendChild(bookTitle);
                bookContainer.appendChild(bookDiv);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
</script>
