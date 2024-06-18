FilePond.registerPlugin(FilePondPluginImagePreview);
// Get a reference to the file input element
const inputElement = $('input[name="filepond"]')[0];
let _token = $('[name=_token]').val();
$.myFilePond(_token,inputElement);

const inputElement1 = $('input[name="image"]')[0];
$.myFilePond(_token,inputElement1);

const inputElement2 = $('input[name="imageBackground"]')[0];
$.myFilePond(_token,inputElement2);
