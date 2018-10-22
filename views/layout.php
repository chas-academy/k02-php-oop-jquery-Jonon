<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Välkommen till TwitterClone!</h1>
        <p class="lead text-muted">Här skriver vi också något säljande om vår bokaffär. Samt har alltid minst en knapp som blir call-to-action</p>
        <p>
            <a href="/books" class="btn btn-primary">Visa Böcker</a>
        </p>
        <p>
            <a href="/customers" class="btn btn-secondary">Visa kunder</a>
        </p>
        <form action="/books/search" method="post">
            <label>Title</label>
            <input type="text" name="title">
            <label>Author</label>
            <input type="text" name="author">
            <input type="submit" value="Search">
        </form>
    </div>
</section>