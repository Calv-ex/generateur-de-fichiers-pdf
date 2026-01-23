export function dateToFr(value)
{
  if (!value) return "";
  return new Date(value).toLocaleDateString("fr-FR");
}
