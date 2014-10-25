<?php
/**
 * Created by BlogBuilder
 * Which was created by Nick Stephen
 * TITLE: Git Your Act Together
 * SUBTITLE: Keeping Clean Without Losing Your History
 * DESC: A simple source control workflow in Git that unclutters your important branches whilst retaining your original commits as history.
 * TAGS: Git;Source_Control;
 */

$this->content[] = (new Section('I Don\'t Git It'))
->addParagraph(new Paragraph('Git is a version control system created by Linus Torvalds in 2005 (yes, <a href="http://en.wikipedia.org/wiki/Linux_kernel">that</a> Linus) that puts great emphasis upon distributed development; the idea that multiple people can simultaneously work on a product and merge them together without much effort. You can, and frequently do, apply the same concept of distributed development even if you\'re working alone. The general idea being that you have a master branch, which is effectively the stable version, and then working branch/es that you can off-shoot whenever you need to create something new or patch something that was previously new and is now broken.'))
;

$this->content[] = (new Section('Committed To Progress'))
->addParagraph(new Paragraph('Like all version control systems, Git uses commits to take frequent spanshots in time of your work. You use commits to denote when you\'ve performed some small progression in your overall task and to write a permanent message about what you did to achieve that. For that reason it\'s very handy to be able to see these messages in the future, especially if something should go wrong with it so that you can nail down the problem. The problem is that using this method of lots of small commits showing incremental progress tends to accumulate a hell of a lot of them over time. This wastes your time as you try to sift through them searching for the spot where you did something. It\'s even more of a problem if you contribute to a group or open source project.'))
->addParagraph(new Paragraph('The question is then, how can we keep a history of our progress yet also unclutter our master branch?'))
;

$this->content[] = (new Section('Back To Basics'))
->addParagraph(new Paragraph('Rebasing! The <code>git rebase</code> command is a very powerful tool for rewriting history and in this circumstance it\'s very handy. That\'s because it can squash together multiple commits and create a new single commit that is equivalent to all of them.'))
;

$this->content[] = (new Section('The Workflow'))
->addParagraph(new Paragraph('So the workflow that I personally use with Git and which I would recommend, is as follows:'))
->addParagraph((new ListHTML())
->setOrdered(True)
->addItem('Start on your master branch')
->addItem('Create a new branch that you will use to track your long term progress, e.g. <code>git branch working_archive</code>')
->addItem('Create and switch to your short term working branch. This is named after whatever you intend to do now: <code>git checkout -b add_feature_or_whatever</code>')
->addItem('Perform your work and commit your progress along the way (on your working branch)<img src="/blog/img/2-Git-1.gif" height="54" width="282" alt="Git Screenshot" title="Git Screenshot">')
->addItem('Once you\'ve finished the work and intend to make the end product the new release version, checkout the master branch again: <code>git checkout master</code>')
->addItem('At this point you can continue on the master branch, but I prefer to make a redundant branch just for this in case I mess it up: <code>git checkout -b group</code>')
->addItem('Merge the temporary branch with the working branch: <code>git merge add_feature_or_whatever</code><img src="/blog/img/2-Git-2.gif" height="51" width="342" alt="Git Screenshot" title="Git Screenshot">')
->addItem('This is the crucial part, rewriting the history to turn the current list of working commits into a single one: <code>git rebase -i master</code>')
->addItem('What comes up next is a list of all the commits between the master branch and the end of the working branch as follows: <code>pick SHA1-ID "Commit Name"</code>We\'re going to pick the first commit and all the others we\'re going to squash. The fastest way to do this is in Vim use the command: <code>:2,$s/pick \\([0-9a-f]\\{7\\}\\)/s \\1/g</code><img src="/blog/img/2-Git-3.png" height="286" width="571" alt="Git Screenshot" title="Git Screenshot">')
->addItem('Then hit <code>:wq</code> to save and quit Vim')
->addItem('Once this finishes, it will come up with another Vim screen to create the message for the new commit. Just enter the message you want, which will be summarising your actions over that entire branch.<img src="/blog/img/2-Git-3.png" height="258" width="579" alt="Git Screenshot" title="Git Screenshot">')
->addItem('You\'ve now got the following situation: <img src="/blog/img/2-Git-5.png" height="66" width="296" alt="Git Screenshot" title="Git Screenshot">')
->addItem('Now switch back to the master branch: <code>git checkout master</code>')
->addItem('Fast-forward merge over that commit: <code>git merge group</code>')
->addItem('And delete the temporary branch: <code>git branch -d group</code>')
->addItem('We now want to save the rest of the commits on the archive branch, so switch to it: <code>git checkout working_archive</code>')
->addItem('Merge it with the working branch: <code>git merge add_feature_or_whatever</code>')
->addItem('Delete the working branch: <code>git branch -d add_feature_or_whatever</code>')
->addItem('And finally, merge with the master branch <code>git merge master</code><img src="/blog/img/2-Git-6.png" height="81" width="381" alt="Git Screenshot" title="Git Screenshot">')
)
->addParagraph((new SubSection('The Results:'))
->addLine('The history of the master branch is perfectly clean, only the single commit. If you push that branch to a remote repository that\'s the only commit that will show, so your co-workers won\'t yell at you and call you names. But the history of your working_archive branch still contains every commit along the way, so down the track when you forget how you did something you can look it up (and you won\'t yell at yourself).')
)
;

$this->content[] = (new Section('Any Questions?'))
->addParagraph(new Paragraph('<code>git checkout -b branch_name</code> : This creates a new branch from your current position, just like if you did <code>git branch branch_name</code>, but it also immediately switches to said branch. A handy little command.'))
->addParagraph(new Paragraph('<code>git rebase -i branch_name</code> : Perform an interactive rebase, where the list of commits goes all the way back to the last link with the other branch.'))
->addParagraph(new Paragraph('<code>pick SHA1-ID "Commit Name"</code> : In the interactive rebase, this command selects this particular commit to be included unaffected.'))
->addParagraph(new Paragraph('<code>s[quash] SHA1-ID "Commit Name"</code> : In the interactive rebase, this command takes this particular commit to be directly added in the previous commit and appends the commit message to the previous commit message. <code>f[ixup] SHA1-ID "Commit Name"</code> is equivalent except that it discards the message.'))
->addParagraph(new Paragraph('<code>:2,$s/pick \\([0-9a-f]\\{7\\}\\)/s \\1/g</code> : A Vim search and replace command. Performs a case insensitive search from the 2nd to the last line. It matches "pick SHA1-ID", where SHA1-ID is a 7 digit hex string, and replaces it with "s SHA1-ID" (s is short for squash).'))
;

$this->content[] = (new Section('The Final Word'))
->addParagraph(new Paragraph('Enjoy!'))
;

