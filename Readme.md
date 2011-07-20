WMD: The Wysiwym Markdown Editor
================================

Introduction
------------

WMD is a JavaScript based code editor for the [Markdown](http://daringfireball.net/projects/markdown/) formatting language.  It includes a Markdown interpreter – Showdown – for live preview and output of the Markdown generated HTML.

This is a fork of WMD for CakePHP. It was forked from ChiperSoft Systems & NFY Interactive designed for use in CMS engines, which in turn was forked from the [Open Library fork](http://github.com/openlibrary/wmd) of WMD and it from the [Stackoverflow fork](http://github.com/derobins/wmd).

Major Changes from Open Library Revision
-------------

* Extended showdown to support a series of Markdown extensions:
  - Link urls that start with ! are opened in a new window
  - Text wrapped with double carets is made superscript (ex: `^^this text is superscripted^^`)
  - Text wrapped with double commas is made subscript (ex: `,,this text is subscripted,,`)
  - Text wrapped with double tildes is made strikethrough (ex: `~~this text is struck~~`)
  - (c), (r), (tm), -- and ... are converted into their respective html entities.
  - Lines prefixed with "->" are right aligned.  Lines also postfixed with "<-" are center aligned.
* Several ascii characters that may produce encoding issues (such as curled quotes) are converted into entities
* Removed top level frame pollution, forcing WMD to run only in its own document.
* Removed the automatic conversion from Markdown to HTML when the form is submitted.
* Removed the automatic addition of http:// to image urls, preventing the entry of relative addresses.
* Numerous bug fixes to both WMD and Showdown

How to use (in your CakePHP view)
----------
    <div class="posts form">
        <?php echo $this->Form->create('Post'); ?>
            <fieldset>
                <legend><?php __('Add Post'); ?></legend>
                <?php
                echo $this->Form->hidden("id");
                echo $this->Form->input('title');
                echo $this->Wmd->input('content');
                ?>
            </fieldset>
        <?php echo $this->Form->end(__('Publish', true));?>
    </div>

License
-------

WMD Editor is licensed under [MIT License](http://github.com/chipersoft/wmd/raw/master/License.txt).


