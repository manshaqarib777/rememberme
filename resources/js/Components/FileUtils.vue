<script >
const baseImageUrl = 'http://127.0.0.1:8000/uploads';

// Function to generate the image URL based on the file name
export const getImageUrl = (dir,fileName) => {
  return `${baseImageUrl}/${dir}/${fileName}`;
};
</script>
