    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Editor.js 🤩🧦🤨 example</title>
  <link href="https://fonts.googleapis.com/css?family=PT+Mono" rel="stylesheet">
  <link href="assets/demo.css" rel="stylesheet">
  <script src="assets/json-preview.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
</head>
<body>
  <div class="ce-example">
    <div class="ce-example__header">
      <a class="ce-example__header-logo" href="https://codex.so/editor">Editor.js 🤩🧦🤨</a>

      <div class="ce-example__header-menu">
        <a href="https://github.com/editor-js" target="_blank">Plugins</a>
        <a href="https://editorjs.io/usage" target="_blank">Usage</a>
        <a href="https://editorjs.io/configuration" target="_blank">Configuration</a>
        <a href="https://editorjs.io/creating-a-block-tool" target="_blank">API</a>
      </div>
    </div>
    <div class="ce-example__content _ce-example__content--small">
      <div id="editorjs"></div>

      <div class="ce-example__button" id="saveButton">
        editor.save()
      </div>
    </div>
    <div class="ce-example__output">
      <pre class="ce-example__output-content" id="output"></pre>

      <div class="ce-example__output-footer">
        <a href="https://codex.so" style="font-weight: bold;">Made by CodeX</a>
      </div>
    </div>
  </div>

  <!-- Load Tools -->
  <!--
   You can upload Tools to your project's directory and use as in example below.
   Also you can load each Tool from CDN or use NPM/Yarn packages.
   Read more in Tool's README file. For example:
   https://github.com/editor-js/header#installation
   -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script><!-- Header -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script><!-- Image -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script><!-- Delimiter -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script><!-- List -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/checklist@latest"></script><!-- Checklist -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script><!-- Quote -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/code@latest"></script><!-- Code -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script><!-- Embed -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script><!-- Table -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/link@latest"></script><!-- Link -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/warning@latest"></script><!-- Warning -->

  <script src="https://cdn.jsdelivr.net/npm/@editorjs/marker@latest"></script><!-- Marker -->
  <script src="https://cdn.jsdelivr.net/npm/@editorjs/inline-code@latest"></script><!-- Inline Code -->

  <!-- Load Editor.js's Core -->
  <script src="../dist/editor.js"></script>

  <!-- Initialization -->
  <script>
    /**
     * Saving button
     */
    const saveButton = document.getElementById('saveButton');
    /**
     * To initialize the Editor, create a new instance with configuration object
     * @see docs/installation.md for mode details
     */
    var editor = new EditorJS({
      /**
       * Wrapper of Editor
       */
      holder: 'editorjs',
      /**
       * Tools list
       */
      tools: {
        /**
         * Each Tool is a Plugin. Pass them via 'class' option with necessary settings {@link docs/tools.md}
         */
        header: {
          class: Header,
          inlineToolbar: ['link'],
          config: {
            placeholder: 'Header'
          },
          shortcut: 'CMD+SHIFT+H'
        },
        /**
         * Or pass class directly without any configuration
         */
        image: {
          class: SimpleImage,
          inlineToolbar: ['link'],
        },
        list: {
          class: List,
          inlineToolbar: true,
          shortcut: 'CMD+SHIFT+L'
        },
        checklist: {
          class: Checklist,
          inlineToolbar: true,
        },
        quote: {
          class: Quote,
          inlineToolbar: true,
          config: {
            quotePlaceholder: 'Enter a quote',
            captionPlaceholder: 'Quote\'s author',
          },
          shortcut: 'CMD+SHIFT+O'
        },
        warning: Warning,
        marker: {
          class:  Marker,
          shortcut: 'CMD+SHIFT+M'
        },
        code: {
          class:  CodeTool,
          shortcut: 'CMD+SHIFT+C'
        },
        delimiter: Delimiter,
        inlineCode: {
          class: InlineCode,
          shortcut: 'CMD+SHIFT+C'
        },
        linkTool: LinkTool,
        embed: Embed,
        table: {
          class: Table,
          inlineToolbar: true,
          shortcut: 'CMD+ALT+T'
        },
      },
      /**
       * This Tool will be used as default
       */
      // initialBlock: 'paragraph',
      /**
       * Initial Editor data
       */
      data: {
        blocks: [
          {
            type: "header",
            data: {
              text: "Editor.js",
              level: 2
            }
          },
          {
            type : 'paragraph',
            data : {
              text : 'Hey. Meet the new Editor. On this page you can see it in action — try to edit this text. Source code of the page contains the example of connection and configuration.'
            }
          },
          {
            type: "header",
            data: {
              text: "Key features",
              level: 3
            }
          },
          {
            type : 'list',
            data : {
              items : [
                'It is a block-styled editor',
                'It returns clean data output in JSON',
                'Designed to be extendable and pluggable with a simple API',
              ],
              style: 'unordered'
            }
          },
          {
            type: "header",
            data: {
              text: "What does it mean «block-styled editor»",
              level: 3
            }
          },
          {
            type : 'paragraph',
            data : {
              text : 'Workspace in classic editors is made of a single contenteditable element, used to create different HTML markups. Editor.js <mark class=\"cdx-marker\">workspace consists of separate Blocks: paragraphs, headings, images, lists, quotes, etc</mark>. Each of them is an independent contenteditable element (or more complex structure) provided by Plugin and united by Editor\'s Core.'
            }
          },
          {
            type : 'paragraph',
            data : {
              text : `There are dozens of <a href="https://github.com/editor-js">ready-to-use Blocks</a> and the <a href="https://editorjs.io/creating-a-block-tool">simple API</a> for creation any Block you need. For example, you can implement Blocks for Tweets, Instagram posts, surveys and polls, CTA-buttons and even games.`
            }
          },
          {
            type: "header",
            data: {
              text: "What does it mean clean data output",
              level: 3
            }
          },
          {
            type : 'paragraph',
            data : {
              text : 'Classic WYSIWYG-editors produce raw HTML-markup with both content data and content appearance. On the contrary, Editor.js outputs JSON object with data of each Block. You can see an example below'
            }
          },
          {
            type : 'paragraph',
            data : {
              text : `Given data can be used as you want: render with HTML for <code class="inline-code">Web clients</code>, render natively for <code class="inline-code">mobile apps</code>, create markup for <code class="inline-code">Facebook Instant Articles</code> or <code class="inline-code">Google AMP</code>, generate an <code class="inline-code">audio version</code> and so on.`
            }
          },
          {
            type : 'paragraph',
            data : {
              text : 'Clean data is useful to sanitize, validate and process on the backend.'
            }
          },
          {
            type : 'delimiter',
            data : {}
          },
          {
            type : 'paragraph',
            data : {
              text : 'We have been working on this project more than three years. Several large media projects help us to test and debug the Editor, to make its core more stable. At the same time we significantly improved the API. Now, it can be used to create any plugin for any task. Hope you enjoy. 😏'
            }
          },
          {
            type: 'image',
            data: {
              url: 'https://codex.so/upload/redactor_images/o_e48549d1855c7fc1807308dd14990126.jpg',
              caption: '',
              stretched: false,
              withBorder: true,
              withBackground: false,
            }
          },
        ]
      },
      onReady: function(){
        saveButton.click();
      },
      onChange: function() {
        console.log('something changed');
      }
    });
    /**
     * Saving example
     */
    saveButton.addEventListener('click', function () {
      editor.save().then((savedData) => {
        cPreview.show(savedData, document.getElementById("output"));
      });
    });
  </script>
</body>
</html>