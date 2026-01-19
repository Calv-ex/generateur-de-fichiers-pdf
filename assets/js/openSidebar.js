export function openSidebar({formlink, sidebar, closeBtn})
{
  formlink.addEventListener("click", () =>
  {
    sidebar.classList.toggle("open");
  });

  closeBtn.addEventListener("click", () =>
  {
    sidebar.classList.remove("open");
  });
}
