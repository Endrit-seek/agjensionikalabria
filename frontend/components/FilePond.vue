<template>
  <div id="app">
    <file-pond
      name="media"
      ref="pond"
      label-idle="Kliko per te shtuar fotografi"
      :allow-multiple="true"
      :disabled="disabled"
      accepted-file-types="image/jpeg, image/png"
      data-allow-reorder="true"
      :files="myFiles"
      :server="{
        url: 'http://localhost:8000/api/medias',
        process: {
          url: '/process',
          onload: handleFilePondLoad,
        },
        revert: async (uniqueFileId: string, load: any, error: any) => {
          handleFilePondRevert(uniqueFileId);
          load();
        },
        restore: '/restore',
        load: '/load',
        fetch: '/fetch',
        headers: {
          'X-CSRF-TOKEN': token
        }
      }"
      :onupdatefiles="(files: any) => {
        myFiles = files;
        console.log(files);
      }"
    />
  </div>
</template>

<script setup lang="ts">
// Import Vue FilePond
import vueFilePond from "vue-filepond";

// Import Plugins
import FilePondPluginFilePoster from "filepond-plugin-file-poster";
import FilePondPluginFileValidateSize from "filepond-plugin-file-validate-size";
import FilePondPluginFileEncode from "filepond-plugin-file-encode";
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginImageCrop from "filepond-plugin-image-crop";
import FilePondPluginImageEdit from "filepond-plugin-image-edit";
import FilePondPluginImageExifOrientation from "filepond-plugin-image-exif-orientation";
import FilePondPluginImageResize from "filepond-plugin-image-resize";
import FilePondPluginImageTransform from "filepond-plugin-image-transform";
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Import FilePond styles
import "filepond/dist/filepond.min.css";
import "filepond-plugin-file-poster/dist/filepond-plugin-file-poster.min.css";
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'

// Create FilePond component
const FilePond = vueFilePond(
  FilePondPluginFileValidateSize,
  FilePondPluginImageCrop,
  FilePondPluginImageEdit,
  FilePondPluginImageExifOrientation,
  FilePondPluginImageResize,
  FilePondPluginFilePoster,
  FilePondPluginImageTransform,
  FilePondPluginFileValidateType,
  FilePondPluginImagePreview,
  FilePondPluginFileEncode
);

defineProps({
  disabled: {
    type: Boolean,
    default: true,
  },
});

const emit = defineEmits(['files']);

const myFiles = ref<Array<string>>([]);
const token = useCookie('XSRF-TOKEN');

function handleFilePondLoad(response: string) {
  const noSpecialChars = response.replace(/[^\w.-]/g, '');
  myFiles.value.push(noSpecialChars);
  emit('files', myFiles);
  return response;
}

async function handleFilePondRevert(id: string) {
  const noSpecialChars = id.replace(/[^\w.-]/g, '');
  await useApiFetch('/api/medias/revert', {
    method: 'DELETE',
    body: [noSpecialChars]
  })
  myFiles.value.splice(myFiles.value.indexOf(noSpecialChars), 1);
  emit('files', myFiles);
}
</script>

<style>
.filepond--credits {
    display: none;
}
</style>