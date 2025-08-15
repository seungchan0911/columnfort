function Search() {
    const searchBtn = document.querySelector("header .search-btn")
    const searchInput = document.querySelector("header .search-input")
    const searchToggle = document.querySelector("header .search-toggle")

    searchToggle.onclick = () => {
        searchInput.focus()
    }

    searchBtn.onclick = () => {
            if (searchInput.value.trim())
                window.location.href = '/collection?search=' + encodeURIComponent(searchInput.value)
        }
        
        searchInput.addEventListener("keydown", (e) => {
            if (e.key === "Enter" && searchInput.value.trim()) {
                window.location.href = '/collection?search=' + encodeURIComponent(searchInput.value)
            }
        })
}

Search()

function mobileSearch() {
    const searchBtn = document.querySelector(".mobile-menu .search-btn")
    const searchInput = document.querySelector(".mobile-menu .search-input")

    searchBtn.onclick = () => {
        if (searchInput.value.trim())
            window.location.href = '/collection?search=' + encodeURIComponent(searchInput.value.trim())
    }

    searchInput.addEventListener("keydown", (e) => {
        if (e.key === "Enter" && searchInput.value.trim()) {
            window.location.href = '/collection?search=' + encodeURIComponent(searchInput.value.trim())
        }
    })
}

mobileSearch()