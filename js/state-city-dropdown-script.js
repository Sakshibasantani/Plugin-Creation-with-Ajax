
function fetchCityData() {
    var stateDropdown = document.getElementById("state-dropdown");
    var selectedState = stateDropdown.value;
    var cityDropdown = document.getElementById("city-dropdown");

    // Clear existing options
    cityDropdown.innerHTML = '<option value="">Select a city</option>';

    // Make an AJAX request to fetch cities based on the selected state
    // Replace the URL below with the endpoint or URL that fetches the city data based on the selected state
    var url = "https://example.com/fetch_city_data.php?state=" + selectedState;

    // Use your preferred method to make an AJAX request, such as the Fetch API or jQuery's AJAX
    // Here, we use the Fetch API as an example
    fetch(url)
        .then(response => response.json())
        .then(data => {
            // Populate cityDropdown with the fetched city data
            data.forEach(city => {
                var optionElement = document.createElement("option");
                optionElement.value = city.value;
                optionElement.textContent = city.text;
                cityDropdown.appendChild(optionElement);
            });
        })
        .catch(error => {
            console.error("Error fetching city data:", error);
        });
}
