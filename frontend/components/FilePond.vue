<template>
  <div id="app">
    <file-pond
      name="media"
      ref="pond"
      label-idle="Drop files here..."
      :allow-multiple="true"
      accepted-file-types="image/jpeg, image/png"
      data-allow-reorder="true"
      :files="myFiles"
      :server="{
        url: 'http://localhost:8000/api/medias',
        process: '/process',
        revert: '/revert',
        restore: '/restore',
        load: '/load',
        fetch: '/fetch',
      }"
      @init="handleFilePondInit"
    />
  </div>
</template>

<script setup>
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


const myFiles = ref([]);
const token = useCookie('XSRF-TOKEN');

function handleFilePondInit() {
  console.log("FilePond has initialized");
}

function handleLoad(event) {
  console.log("load", event.detail);
};
</script>

<style>
.filepond--credits {
    display: none;
}
</style>