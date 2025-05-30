function search() {
    const searchBtn = document.querySelector(".search-btn")
    const searchInput = document.querySelector(".search input")

    searchBtn.onclick = () => {
            if (searchInput.value.trim())
                window.location.href = `../collection.html?id=${searchInput.value}`
        }
        
        searchInput.addEventListener("keydown", (e) => {
            if (e.key === "Enter" && searchInput.value.trim()) {
                window.location.href = `../collection.html?id=${searchInput.value}`
            }
        })
}

search()