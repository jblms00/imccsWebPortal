$(document).ready(function () {
    const currentUrl = window.location.href;

    if (currentUrl.includes("generalFAQs")) {
        displayAccordions(generalAccordions);
    } else if (currentUrl.includes("faqForStudents")) {
        displayAccordions(studentAccordions);
    } else {
        console.error("No FAQs to display for this URL.");
    }
});

const studentAccordions = [
    {
        id: "accordionAccountManagement",
        title: "Account Management",
        icon: "fa-user-lock",
        items: [
            {
                question: "How do I log in to the student portal?",
                answer: "To log in, use your assigned username and the default password, which is the last three letters of your last name followed by the last five digits of your student number.",
            },
            {
                question: "What if I forget my password?",
                answer: "If you forget your password, you can reset it by using the 'Forgot Password' option on the login page. Follow the instructions provided.",
            },
            {
                question: "Can I deactivate my account?",
                answer: "No, student accounts cannot be deactivated. You may only change your password.",
            },
            {
                question: "How often can I change my password?",
                answer: "You can change your password as often as necessary to ensure your account security.",
            },
            {
                question: "What if I encounter issues logging in?",
                answer: "If you have trouble logging in, please contact IT Support at the school for assistance.",
            },
            {
                question: "Will I receive a notification for password changes?",
                answer: "Yes, you will receive an email notification whenever your password is changed.",
            },
            {
                question:
                    "Is there a limit to how many times I can attempt to log in?",
                answer: "Yes, after several unsuccessful login attempts, your account may be temporarily locked for security reasons.",
            },
            {
                question: "Can I share my account with others?",
                answer: "No, sharing your account credentials is against the school policy and could lead to account suspension.",
            },
            {
                question: "How can I update my personal information?",
                answer: "You can update your personal information through the student portal’s profile settings.",
            },
            {
                question:
                    "What should I do if I suspect my account has been compromised?",
                answer: "Immediately change your password and contact IT Support to report the issue.",
            },
        ],
    },
    {
        id: "accordionAcademicInfo",
        title: "Academic Information",
        icon: "fa-book-open",
        items: [
            {
                question: "How can I view my academic grades?",
                answer: "You can view your academic grades by logging into the student portal and navigating to the 'Grades' section.",
            },
            {
                question: "Where can I find the academic calendar?",
                answer: "The academic calendar is available under the 'Academic' section of the student portal.",
            },
            {
                question: "Can I download my academic prospectus?",
                answer: "Yes, the prospectus can be found in the 'Resources' section of the portal for download.",
            },
            {
                question: "How do I know when my exams are scheduled?",
                answer: "Exam schedules are listed in the 'Announcements' section and can also be found in the academic calendar.",
            },
            {
                question: "Are grades updated in real-time?",
                answer: "Grades are updated periodically; please check back regularly for the latest updates.",
            },
            {
                question: "Can I appeal my grades?",
                answer: "Yes, if you believe there is an error in your grade, please follow the appeals process outlined by the school.",
            },
            {
                question: "Where can I find important announcements?",
                answer: "Important announcements are posted in the 'Announcements' section of the student portal.",
            },
            {
                question: "How do I access course materials?",
                answer: "Course materials will be available in the 'Courses' section of the portal, provided by your instructors.",
            },
            {
                question:
                    "What should I do if I have questions about my grades?",
                answer: "You can contact your instructor directly or visit the academic office for assistance.",
            },
            {
                question: "Is there a deadline for grade appeals?",
                answer: "Yes, all grade appeals must be submitted within a specified timeframe as outlined in the student handbook.",
            },
        ],
    },
    {
        id: "accordionPayments",
        title: "Payments and Tuition",
        icon: "fa-money-bill-wave",
        items: [
            {
                question:
                    "Can I pay my tuition fees through the student portal?",
                answer: "No, tuition fees cannot be paid through the student portal. Payments must be made in person at the school.",
            },
            {
                question: "Is online payment available?",
                answer: "Currently, online payments are not available, but stay tuned for updates as this feature may be added in the future.",
            },
            {
                question: "How can I check my tuition balance?",
                answer: "Your tuition balance can be viewed in the 'Tuition' section of the student portal.",
            },
            {
                question: "What if I have questions about my tuition fees?",
                answer: "For questions regarding tuition fees, please contact the finance office directly.",
            },
            {
                question: "Are there any payment plans available?",
                answer: "Please check with the finance office for information on available payment plans.",
            },
            {
                question: "What forms of payment are accepted?",
                answer: "Payments can be made via cash, check, or bank transfer at the school's finance office.",
            },
            {
                question: "Can I get a receipt for my payments?",
                answer: "Yes, you will receive a receipt for all payments made at the finance office.",
            },
            {
                question: "How will I be notified about tuition deadlines?",
                answer: "Tuition deadlines will be announced in the 'Announcements' section of the student portal.",
            },
            {
                question: "Is there financial aid available?",
                answer: "Information about financial aid can be obtained from the student services office.",
            },
            {
                question: "What happens if I miss a tuition payment?",
                answer: "Missing a tuition payment may result in penalties or restrictions on course registration. Please contact the finance office for guidance.",
            },
        ],
    },
    {
        id: "accordionServicesOverview",
        title: "Services Overview",
        icon: "fa-university",
        items: [
            {
                question:
                    "Why is there a Library Fee even during the pandemic?",
                answer: "The IMCC Library continued providing its services throughout the pandemic, allowing students to conduct research and borrow resources with appropriate health protocols. Additionally, students have access to online journals and research materials, ensuring continuity in library support.",
            },
            {
                question: "How is the Sports Fee allocated?",
                answer: "The Sports Fee funds maintenance and repair of sports facilities, webinars for coaches and athletes, and rehabilitation of equipment. For updates, check the IMCC DSA Facebook page.",
            },
            {
                question: "What does the Cultural Fee cover?",
                answer: "The fee supports new equipment for the Kapagintaw Band and Dance Troupe, maintenance of the cultural office, and provisions like cabinets. Updates are available on the IMCC DSA Facebook page.",
            },
            {
                question:
                    "What services are included in the Medical Health Service Fee?",
                answer: "This fee includes access to school clinic and dental services, online consultations, and scheduling for services such as tooth extractions. The clinic guarantees confidentiality of student health records. Visit the School Clinic Facebook page for more information.",
            },
            {
                question: "Why do Laboratory Fees differ by department?",
                answer: "Each department justifies lab fees based on specific activities and needs for each semester. Fee structures vary by course and level; for guidance, please consult your instructors or department heads.",
            },
            {
                question: "Will there be a Graduation Fee for batch 2021?",
                answer: "No fee was collected for the 2021 batch. For batch 2020, a ceremony is being planned by the college deans, and details will be announced soon.",
            },
            {
                question: "Is there a tuition fee increase?",
                answer: "For 2nd to 4th-year students, there is no tuition increase. A slight adjustment was made for 1st-year students only. Tuition fees may differ slightly between levels or courses due to normal variations. For official comparisons, refer to the fee schedule posted at the IMCC Business Office.",
            },
        ],
    },
];

const generalAccordions = [
    {
        id: "accordionGeneralInfo",
        title: "General School Information",
        icon: "fa-info-circle",
        items: [
            {
                question:
                    "What programs does Iligan Medical Center College offer?",
                answer: "IMCC offers a variety of programs in healthcare and allied fields. Please check the website for a complete list of courses.",
            },
            {
                question: "Where is the school located?",
                answer: "IMCC is located in Iligan City, Mindanao, Philippines.",
            },
            {
                question: "What are the school’s operating hours?",
                answer: "The school operates from Monday to Friday, 8 AM to 5 PM.",
            },
            {
                question: "How can I contact the school?",
                answer: "You can contact the school via phone or email, both of which are listed on the school’s official website.",
            },
            {
                question: "Are there extracurricular activities available?",
                answer: "Yes, IMCC offers various extracurricular activities and student organizations. Please check the student portal for more details.",
            },
            {
                question: "What facilities are available on campus?",
                answer: "The campus includes classrooms, laboratories, libraries, and student lounges.",
            },
            {
                question:
                    "Is the campus accessible for students with disabilities?",
                answer: "Yes, IMCC is committed to providing an accessible environment for all students.",
            },
            {
                question: "How can I provide feedback about the school?",
                answer: "Feedback can be submitted through the student portal or directly to the administration office.",
            },
            {
                question: "Are there any student support services available?",
                answer: "Yes, IMCC provides counseling, academic advising, and career services.",
            },
            {
                question: "What is the school’s policy on academic integrity?",
                answer: "IMCC has a strict academic integrity policy. Violations may result in disciplinary action.",
            },
        ],
    },
    {
        id: "accordionHealthSafety",
        title: "Health and Safety",
        icon: "fa-heartbeat",
        items: [
            {
                question: "What health services are available for students?",
                answer: "IMCC offers basic health services and referrals to local healthcare providers.",
            },
            {
                question:
                    "What should I do in case of a medical emergency on campus?",
                answer: "In case of a medical emergency, contact campus security or the nearest faculty member for immediate assistance.",
            },
            {
                question: "Is there a counseling service available?",
                answer: "Yes, counseling services are available for students needing support.",
            },
            {
                question: "What measures are in place for COVID-19?",
                answer: "IMCC follows local health guidelines regarding COVID-19 safety measures. Please check the school portal for updates.",
            },
            {
                question:
                    "How can I report an incident or concern about safety?",
                answer: "Incidents can be reported to campus security or the administration office.",
            },
            {
                question: "Is there a student insurance policy?",
                answer: "Information about student insurance policies can be obtained from the student services office.",
            },
            {
                question: "What should I do if I feel unwell during class?",
                answer: "If you feel unwell during class, inform your instructor and seek medical assistance if necessary.",
            },
            {
                question: "Are there first aid kits available on campus?",
                answer: "Yes, first aid kits are located in various areas across campus.",
            },
            {
                question: "What safety drills does the school conduct?",
                answer: "IMCC conducts regular fire and earthquake drills to ensure student safety.",
            },
            {
                question: "How can I stay informed about health updates?",
                answer: "Health updates are communicated via the student portal and announcements.",
            },
        ],
    },
    {
        id: "accordionPolicies",
        title: "School Policies",
        icon: "fa-file-contract",
        items: [
            {
                question: "What is the attendance policy?",
                answer: "IMCC expects students to attend all classes. Specific attendance policies may vary by course.",
            },
            {
                question: "What is the grading policy?",
                answer: "The grading policy outlines the criteria for assessing student performance. Details can be found in the student handbook.",
            },
            {
                question: "What are the rules regarding academic honesty?",
                answer: "IMCC has a strict policy on academic honesty. Plagiarism or cheating can result in severe penalties.",
            },
            {
                question: "How can I appeal a disciplinary decision?",
                answer: "Students can appeal disciplinary decisions by following the process outlined in the student handbook.",
            },
            {
                question: "What is the policy on harassment?",
                answer: "IMCC has a zero-tolerance policy on harassment. All incidents should be reported to the administration.",
            },
            {
                question: "Are there dress code requirements?",
                answer: "Yes, IMCC has a dress code policy that all students are expected to follow.",
            },
            {
                question: "What should I do if I have a complaint?",
                answer: "Complaints can be directed to the administration office or submitted through the student portal.",
            },
            {
                question: "Are there guidelines for using school facilities?",
                answer: "Yes, guidelines for using school facilities are provided in the student handbook.",
            },
            {
                question: "How does the school handle bullying?",
                answer: "IMCC has policies in place to address and prevent bullying. Students should report any incidents immediately.",
            },
            {
                question: "What is the policy on cell phone use in class?",
                answer: "Cell phone use is generally prohibited during class unless specifically allowed by the instructor.",
            },
        ],
    },
];

function displayAccordions(accordions) {
    renderAccordionButtons(accordions);
    renderAccordionContent(accordions);
}

function renderAccordionButtons(accordions) {
    var btnContainer = $(".btn-container");

    accordions.forEach(function (accordion, index) {
        var btnCollapse = `
            <a class="btn-collapse${
                index === 0 ? " active-collapse" : ""
            }" data-bs-toggle="collapse" href="#${
            accordion.id
        }" role="button" aria-expanded="false">
                <i class="fa-solid ${accordion.icon} fs-1 mb-2"></i> ${
            accordion.title
        }
            </a>
        `;
        btnContainer.append(btnCollapse);
    });
}

function renderAccordionContent(accordions) {
    var collapseContainer = $(".collapse-container");

    accordions.forEach(function (accordion, index) {
        var accordionContainer = `
            <div class="accordion container accordion-flush p-0 collapse${
                index === 0 ? " show" : ""
            }" id="${accordion.id}">
        `;

        accordion.items.forEach(function (item, itemIndex) {
            var itemId = `${accordion.id}Item${itemIndex}`;
            var accordionItem = `
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#${itemId}" aria-expanded="false" aria-controls="${itemId}">
                            ${item.question}
                        </button>
                    </h2>
                    <div id="${itemId}" class="accordion-collapse collapse" data-bs-parent="#${accordion.id}">
                        <div class="accordion-body">
                            <p>${item.answer}</p>
                        </div>
                    </div>
                </div>
            `;
            accordionContainer += accordionItem;
        });

        accordionContainer += `</div>`;
        collapseContainer.append(accordionContainer);
    });

    initializeCollapseButtons();
}

function initializeCollapseButtons() {
    $(document).on("click", ".btn-collapse", function () {
        var $target = $($(this).attr("href"));
        $(".collapse").not($target).collapse("hide");
        $target.collapse("toggle");

        if ($(this).hasClass("collapsed")) {
            $(".btn-collapse").removeClass("active-collapse");
        } else {
            $(".btn-collapse").removeClass("active-collapse");
            $(this).addClass("active-collapse");
        }
    });
}
