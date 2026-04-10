// document.addEventListener("DOMContentLoaded", () => {
//   fetch("../components/header.html")
//     .then(response => response.text())
//     .then(data => {
//       document.getElementById("header").innerHTML = data;
//     })
//     .catch(error => console.error("Header load error:", error));
// });
//   document.addEventListener("DOMContentLoaded", () => {
//   fetch("../components/footer.html")
//     .then(response => response.text())
//     .then(data => {
//       document.getElementById("footer").innerHTML = data;
//     })
//     .catch(error => console.error("Footer load error:", error));
// });
document.addEventListener("DOMContentLoaded", () => {
  // Header
  fetch("../components/header.html")
    .then((res) => res.text())
    .then((data) => (document.getElementById("header").innerHTML = data))
    .catch((err) => console.error("Header load error:", err));

  // Footer
  fetch("../components/footer.html")
    .then((res) => res.text())
    .then((data) => (document.getElementById("footer").innerHTML = data))
    .catch((err) => console.error("Footer load error:", err));
});

