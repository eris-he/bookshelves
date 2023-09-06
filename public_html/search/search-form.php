<!-- Search form -->
<!-- Filter by: genre -->

<form class="searchForm">
    <div class="row">
        <div class="col-lg-3">
             <!-- Genre dropdown -->
            <select class="form-control" id="genre">
                <option value="" selected>Browse By Genre</option>
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
            <button type="submit" class="btn btn-light">
                <i class="fa-solid fa-search"></i>
            </button>
        </div>
    </div>
</form>