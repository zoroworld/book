<?php

session_start();
require_once ("db/phperror.php");
require_once ("db/function.php");


//for getting cart list we add--------------
$productOrderEmpty = count_order_product();

$siteTitle = "Book | About Us";
$author = "bookauthor";
$keywords = "horor, college, adventure";
$description = "The book have knowledge of world, universe etc";
require_once ("template/header.php");
?>

<section class="top-banner-padding banner about-banner">
    <div class="owncontainer container">
        <h1>About Page</h1>
    </div>
</section>
<section class="about-page-section">
    <div class="whole-wrap">
        <div class="owncontainer container">
            <div class="owncontainer container border-top-generic pt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="img-text">
                            <img src="img/a.jpg" alt="" class="img-fluid float-left mr-20 mb-20">
                            <p>A book is a medium for recording information in writing or images, typically composed of
                                many pages, bound together, and protected by a cover. It is a substantial-length written
                                work, classified into fiction and non-fiction, with smaller categories like children's
                                literature and reference works. Books are traded at regular stores and specialized
                                bookstores, and people can borrow them from libraries. The reception of books has led to
                                social consequences, including censorship.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <p>Physical books can contain drawings, engravings, photographs, puzzles, or removable content
                            like paper dolls. They can also be left empty for writing or drawing. The contemporary book
                            industry has seen several major changes due to new technologies. The sale of printed books
                            has decreased due to the increased use of eBooks, but printed books still largely outsell
                            eBooks. The 21st century has also seen a rapid rise in the popularity of audiobooks,
                            recordings of books being read aloud. Additionally, formats designed for greater
                            accessibility, such as braille printing or text-to-voice formats, have been developed.
                            Google Books estimated that as of 2010, approximately 130,000,000 unique books had been
                            published.</p>
                    </div>
                    <div class="col-lg-12">
                        <p>The history of books has evolved significantly since the 1980s, with contributions from
                            various fields such as textual scholarship, codicology, bibliography, philology,
                            palaeography, art history, social history, and cultural history. The field aims to
                            demonstrate that books are not just objects but conduits of interaction between readers and
                            words. The earliest forms of writing were etched on stone slabs, transitioning to palm
                            leaves and papyrus in ancient times. Parchment and paper later emerged as important
                            substrates for bookmaking, introducing greater durability and accessibility.</p>
                    </div>
                    <div class="col-md-12">
                        <div class="img-text">
                            <img src="img/a2.jpg" alt="" class="img-fluid float-left mr-20 mb-20">
                            <p>The Middle Ages saw the rise of illuminated manuscripts, which blended text and imagery.
                                Before the invention of the printing press, each text was a unique handcrafted valuable
                                article, personalized through design features. The 15th-century printing press
                                revolutionized book production with innovations like movable type and steam-powered
                                presses, accelerating manufacturing processes and increasing literacy rates. Copyright
                                protection also emerged, securing authors' rights and shaping the publishing landscape.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-top-border">
                <h3 class="mb-30">About Book</h3>
                <div class="row">
                    <div class="col-md-3">
                        <img src="assets/img/test.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-9 mt-sm-20">
                        <p>Modern books are organized according to a book's layout, which includes a front cover, a back
                            cover, and the body copy or content pages. The front cover often contains the book's title,
                            subtitle, and the name of its author or editor. The inside front cover page is usually blank
                            in both hardcover and paperback books. The next section is the front matter, which includes
                            textual material after the front cover but not part of the content. Between the body copy
                            and the back cover, the end matter includes indices, tables, diagrams, glossaries, or lists
                            of cited works. The inside back cover page is usually blank. The back cover is the usual
                            place for the book's ISBN and may include a photograph of the author(s)/editor(s), a short
                            introduction, plot summaries, barcodes, and excerpted reviews. The body of the book is
                            usually divided into parts, chapters, sections, and sometimes subsections, each composed of
                            at least a paragraph or more.</p>
                    </div>
                </div>
            </div>
            <div class="section-top-border text-right">
                <div class="row">
                    <div class="col-md-9">
                        <p class="text-right">From the 15th century to the early 20th century, book printing and binding
                            methods remained unchanged. Despite mechanization, book printers still used movable metal
                            type assembled into words, lines, and pages. Modern paper books are printed on paper
                            designed specifically for printing, typically off-white or low-white, opaque, and made to
                            tighter caliper or thickness specifications.</p>
                        <p class="text-right"> Different paper grades are used depending on the book type, including
                            machine finished coated papers, woodfree uncoated papers, coated fine papers, and special
                            fine papers. Today, most books are printed by offset lithography, with pages laid out on a
                            plate to ensure correct sequence after folding. Books are manufactured in a few standard
                            sizes, usually specified as "trim size," which result from sheet sizes that became popular
                            200 or 300 years ago and dominate the industry. British conventions prevail throughout the
                            English-speaking world, except for the US, while the European book manufacturing industry
                            operates to a different set of standards.</p>
                    </div>
                    <div class="col-md-3">
                        <img src="assets/img/book.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="section-top-border">
                <h3 class="mb-30">Digital printing</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-defination">
                            <h4 class="mb-20">Binding</h4>
                            <p>Digital printing has revolutionized book manufacturing by using toner instead of ink and
                                printing each book in one pass. This allows for smaller quantities than offset printing
                                due to the absence of make readies and spoilage. Additionally, digital printing allows
                                for print-on-demand, where books are printed only after an order is received from a
                                customer.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-defination">
                            <h4 class="mb-20">Finishing</h4>
                            <p>In the mid-20th century, trade binders specialized in binding, typesetting, and printing.
                                However, due to computerization, typesetting has shifted upstream, with publishers,
                                publishers, or authors handling the job. Mergers have made it rare to find a separate
                                bindery.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-defination">
                            <h4 class="mb-20">Definition 03</h4>
                            <p>Making cases is a process that occurs off-line before a book's binding line. It involves
                                placing cardboard pieces onto a cloth, glued together, and a thinner board cut to the
                                spine width. The cloth's overlapping edges are folded over the boards and pressed down.
                                The stack of cases is then placed in the foil stamping area for decoration and
                                typesetting.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-top-border">
                <h3 class="mb-30">Children's books</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="generic-blockquote">
                            Children's literature encompasses stories, books, magazines, and poems aimed at children,
                            with modern classifications ranging from young adult fiction to picture books. The
                            development of early children's literature is difficult to trace, but many classic tales
                            were originally created for adults and later adapted for younger audiences. Since the
                            fifteenth century, much literature has been aimed specifically at children, often with moral
                            or religious messages. Influences from religious sources like Puritan traditions and
                            philosophical and scientific standpoints like Charles Darwin and John Locke have shaped
                            children's literature. The late nineteenth and early twentieth centuries are known as the
                            "Golden Age of Children's Literature" due to the publication of many classic children's
                            books.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once ("template/footer.php"); ?>